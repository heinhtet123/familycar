<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidding;
use App\Payment;
use Auth;
class PaymentController extends Controller
{
    function pay($bidwonId){
    	
    	$payment=Bidding::where("id",$bidwonId)->first();
    	
    	if(!$payment):
    		return redirect()->route('backend.bidding.bidwon');
    	endif;

    	
    	return view("backend.payment.index")->with("payment",$payment)->with("carId",$payment->car_id);
    }

    function store(Request $request)
    {
        if($request->isMethod("post"))
        {
           
           $biddingId=(int) $request->input("bidding_id");
           $carId=(int) $request->input("car_id");
           $bankAccount=$request->input("bankaccount");
           $bidPrice=(double) Bidding::where("id",$biddingId)->first()->bidprice;
           $userId=Auth::user()->id;
           $data=["user_id"=>$userId,"car_id"=>$carId,"bidding_id"=>$biddingId,"fees"=>$bidPrice,"status"=>2,"bankaccount"=>$bankAccount];

           
           \DB::transaction(function () use ($data) {
                try
                {
                    Payment::create($data);
                    Bidding::where("id",$data["bidding_id"])->update(["status"=>3]);
                    
                }
                catch (\PDOException $e)
                {
                  print_r($e);    
                }

            });

           return redirect()->route('backend.bidding.bidwon'); 
          
           
           
        }   
    }

}
