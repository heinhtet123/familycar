<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidding;
use Auth;
class BiddingController extends Controller
{
    

    function bidWonList()
    {	
    	$userId=(int) Auth::user()->id;
    	$bidWons=Bidding::where("status",2)->orWhere("status",3)->where("user_id",$userId)->get();
    	return view("backend.bidwon.index")->with("bidWons",$bidWons);
    }


}
