<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        // SELECT Count(user_id) AS usercount,`user_id`,`id` FROM `payment` WHERE payment.status=2 GROUP BY `user_id`
        //ORDER BY `usercount` DESC;
        
        $most_pay_user=Payment::select("user_id","id",\DB::raw("COUNT(payment.user_id) as usercount"))->where("status",2)->groupBy("user_id")->orderBy("usercount","DESC")->paginate(10);

        return view('home')->with("mostPaidUsers",$most_pay_user);
    }

    public function mostbrand(Request $request)
    {
         if($request->ajax() && $request->isMethod("post"))
         {
              $car_data=[];
              $most_bought_cars=Payment::select("car_id",\DB::raw("COUNT(payment.car_id) as carcount"))->where("status",2)->groupBy("car_id")->orderBy("carcount","DESC")->paginate(10);

              foreach ($most_bought_cars as $key => $car) {
                  # code...
                    $car_data[$key]=$car->car->model->brand->name;
              }
              $occurences =array_count_values($car_data);
              
              return response()->json($occurences);
              exit();
         }
    }


    public function MontlySaleReport(Request $request)
    {
        if($request->ajax() && $request->isMethod("post"))
         {
            $data=[0,0,0,0,0,0,0];
            // SELECT month(created_at) AS created,COUNT(*),`status` FROM `payment`  where status=2 GROUP BY created;
            $montlySaleReports = \DB::select("SELECT month(created_at) AS created,COUNT(*) AS total,`status` FROM `payment`  where status=? GROUP BY created;", [2]);

            // $montlySaleReports=Payment::select(\DB::raw("month(created_at) as created,COUNT(*) as total,'status' "))->where('status',2)->groupBy("created")->paginate(7);

            foreach ($montlySaleReports as $key => $value) {
                # code...
                $data[$value->created-1]=$value->total;
            }

            return response()->json($data);
            exit();
         }
    }

}