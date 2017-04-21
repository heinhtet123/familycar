<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use App\CarCompany;
class BrandController extends Controller
{
    //
	public function index(Request $request)
	{	
		$brands=Brand::with('carcompany')->paginate(5);
		
    	return view('backend.brand.index')->with('brands',$brands);
		
	}

	public function create()
	{
		$company_lists=CarCompany::pluck("name","id");
		return view('backend.brand.create')->with("company_lists",$company_lists);
	}

	public function store(Request $request)
	{
		$data=$request->all();

    	$return=Brand::create($data);
    	if(!empty($return))
    	{
    		  $request->session()->flash('create_message', 'Successfully Created!');
    		  return redirect()->route('backend.brand.index');
    	}
	}


	 public function destroy($id,Request $request)
    {
    	$brand = Brand::findOrFail($id);
        
        if($brand->delete()):
        	$request->session()->flash('delete_message', 'Successfully Deleted!');
        	// Session::flash('message', 'Successfully Deleted!');
        	return redirect()->route('backend.brand.index');
    	endif;
    }



}
