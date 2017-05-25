<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Car;
use Auth;
use App\Bidding;
use App\Http\Repositories\BookingRepositories;
class BiddingController extends Controller
{
    protected $bookingrepo;

    public function __construct(BookingRepositories $bookingrepo)
    {
        $this->bookingrepo=$bookingrepo;
    }

    //
	private function bidwin()
	{
		$currentDate=date("Y-m-d H:i:s");
		$cars=Car::where("status",1)->get();
		foreach ($cars as $car) {
			// MAX(bidding.bidprice) AS max_price,id
			if($currentDate>=$car->end_bidding_time):

				$bid=Bidding::where("bidprice",\DB::raw("(SELECT MAX(bidprice) FROM bidding where car_id='".$car->id."' GROUP BY bidding.car_id )"))->where("car_id",$car->id)->first();
				
				$bidId=$bid->id;
				$carId=$car->id;
	
				 \DB::transaction(function () use ($bidId,$carId) {
				 	Car::where("id",$carId)->update(["status"=>2]);
				 	Bidding::where("car_id",$carId)->update(["status"=>0]);
		         	Bidding::where("id",$bidId)->update(["status"=>2]);
		        });

				
			endif;
		}
	}

    function index(Request $request)
    {
    	
    	$this->bidwin();

    	$cars=Car::where("status",1)->paginate(8);
    	return view("frontend.index")->with("cars",$cars);
    }


    function tobid($id,Request $request){
    	$car=Car::where("id",$id)->first();
    	$end_time=$this->bookingrepo->daysleft($car->end_bidding_time);
    	$max_bid=Bidding::where("car_id",$id)->max("bidprice");


    	if($car->status!=1):
    		return \Redirect::intended($this->redirectPath());
    	endif;

    	return view("frontend.bidding")->with("car",$car)->with("timeDiff",$end_time)->with("maxprice",$max_bid);
    }

  //   private function daysleft($endtime)
  //   {
  //   	$datetime1 = new \DateTime($endtime);
  //   	$datetime2 = new \DateTime(date("Y-m-d H:i:s"));
  //   	$interval = $datetime1->diff($datetime2);
		// return $interval->format('%a days %h hours %i minutes %s seconds');

  //   }

    function placeBid(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$carId=(int) $request->input("car_id");
    		$userId=Auth::user()->id;
    		$bidprice=(int) $request->input("bidprice");
    		$date=date("Y-m-d");
    		$data=["bidprice"=>$bidprice,"car_id"=>$carId,"optiontime"=>$date,"status"=>1,"user_id"=>$userId];
    		$car=Car::select("floor_price")->where("id",$carId)->first();
    		$carPrice=(double) $car->floor_price;


    		if($bidprice>$carPrice):
    			$return=Bidding::create($data);
    		else:
    		   $request->session()->flash('lessprice', 'Your bid not exceed Floor Price!');
    		    return redirect()->route('frontend.tobid',["id"=>$carId]);
    		endif;
	    	
	    	if(!empty($return))
	    	{
	    	 // $request->session()->flash('create_message', 'Successfully Created!');
    		  return redirect()->route('frontend.index');
	    	}

    	}
    }

    function about(Request $request)
    {
    	return view("frontend.about");
    }

    function services()
    {
    		return view("frontend.about");
    }

    function contact()
    {
    		return view("frontend.contact");
    }


    private function redirectPath()
    {
    	if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/frontend';

    }

}
