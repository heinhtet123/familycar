<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CarModel;
use Auth;
use App\Car;
use App\Payment;
class CarController extends Controller
{


    public function carpayment(Request $request)
    {
         $data=$request->all();
         unset($data["_token"]);

         return view("backend.car.registrationpayment")->with("values",$data);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $cars=Car::where("user_id",$userId)->with("model")->paginate(5);
        return view("backend.car.index")->with("cars",$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_models=CarModel::with("brand")->get();
        
        return view("backend.car.create")->with("models",$car_models);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $values=$request->input("sval");
         $user_id=Auth::user()->id;
         $bankaccount=$request->input("bankaccount");
         $data=["model_id"=>$values[0],"status"=>1,"user_id"=>$user_id,"numberof_cylinders"=>$values[3],"transmission"=>$values[2],"color"=>$values[1],"fuel_type"=>$values[4],"engine"=>$values[5],"floor_price"=>$values[6],"end_bidding_time"=>$this->endedtime()];
        

        $return=\DB::transaction(function () use($data,$bankaccount) {
            
            $car=Car::firstOrCreate($data);
            $payment=["user_id"=>$data["user_id"],"car_id"=>$car->id,"fees"=>200,"status"=>1,"bankaccount"=>$bankaccount];
            Payment::create($payment);
            
        });

        if(is_null($return))
        {
            $request->session()->flash('create_message', 'Successfully Created!');
            return redirect()->route('backend.car.index');
        }
 

    }

    private function endedtime()
    {
        $date = new \DateTime("+2 months");
        $date->format("d/m/Y H:m:s");
        return $date;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

}
