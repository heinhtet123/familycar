<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CarCompany;

class CarCompanyController extends Controller
{
    

    public function index()
    {
    	$carcompany=CarCompany::paginate(5);
    	return view('backend.company.index')->with('carcompany',$carcompany);
    }

    public function create()
    {
    	return view('backend.company.create');
    }

    public function store(Request $request)
    {
    	$data=$request->all();
    	$return=CarCompany::create($data);
    	if(!empty($return))
    	{
    		  return redirect()->route('backend.company.index');
    	}
    	
    }

    public function destroy($id,Request $request)
    {
    	$carcompany = CarCompany::findOrFail($id);
       
        if($carcompany->delete()):
        	$request->session()->flash('message', 'Successfully Deleted!');
        	// Session::flash('message', 'Successfully Deleted!');
        	return redirect()->route('backend.company.index');
    	endif;
    }

}
