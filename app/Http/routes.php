<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// use Illuminate\Support\Facades\Redis;

// Route::get('/',function(){
// 	$visits=Redis::incr('visits');
// 	return $visits;
// });





Route::get('/','Auth\AuthController@getlogin');
Route::post('/','Auth\AuthController@postlogin');


Route::get('auth/login','Auth\AuthController@getlogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// front end
Route::group(['prefix' => 'frontend'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::get('/',['as'=>'frontend.index','uses'=>'Frontend\BiddingController@index']);
	Route::get('about',['as'=>'frontend.about','uses'=>'Frontend\BiddingController@about']);
	Route::get('services',['as'=>'frontend.services','uses'=>'Frontend\BiddingController@services']);
    Route::get('contact',['as'=>'frontend.contact','uses'=>'Frontend\BiddingController@contact']);
    Route::get('tobid/{id}',['as'=>'frontend.tobid','uses'=>'Frontend\BiddingController@tobid']);
    Route::get('login',['as'=>'frontend.login','uses'=>'Frontend\AuthController@login']);
    Route::post('login',['as'=>'frontend.login','uses'=>'Frontend\AuthController@login_process']);
    Route::get('logout',['as'=>'frontend.logout','uses'=>'Frontend\AuthController@logout']);
   // custom login
   Route::group(['middleware'=>"frontguard"],function()
   {
   		 Route::post('placeBid',['as'=>'frontend.placeBid','uses'=>'Frontend\BiddingController@placeBid']);
   });


});


// backend
Route::group(['prefix'=>"backend",'middleware'=>['auth',"web"]],
function()
{

	Route::get('/',['as'=>'backend.index','uses'=>'Backend\HomeController@index']);
	Route::post('mostbrand',['as'=>"backend.mostbrand","uses"=>"Backend\HomeController@mostbrand"]);
	Route::post('monthlysale',['as'=>"backend.monthlysale","uses"=>"Backend\HomeController@MontlySaleReport"]);

	Route::get("brand",['as'=>'backend.brand.index','uses'=>'Backend\BrandController@index']);
	Route::get("brand/create",['as'=>'backend.brand.create','uses'=>'Backend\BrandController@create']);
	Route::post('brand/store',['as'=>"backend.brand.store","uses"=>"Backend\BrandController@store"]);
	Route::delete('brand/destroy/{id}',['as'=>"backend.brand.destroy","uses"=>"Backend\BrandController@destroy"]);

	Route::get("company",['as'=>'backend.company.index','uses'=>'Backend\CarCompanyController@index']);
	Route::get("company/create",['as'=>'backend.company.create','uses'=>'Backend\CarCompanyController@create']);
	Route::post('company/store',['as'=>"backend.company.store","uses"=>"Backend\CarCompanyController@store"]);
	Route::delete('company/destroy/{id}',['as'=>"backend.company.destroy","uses"=>"Backend\CarCompanyController@destroy"]);


	Route::resource('model','Backend\ModelController');
	
	Route::get("car/carpayment",['as'=>"backend.car.carpayment","uses"=>"Backend\CarController@carpayment"]);
	Route::resource('car','Backend\CarController');


	Route::get("bidwon",["as"=>"backend.bidding.bidwon","uses"=>"Backend\BiddingController@bidWonList"]);

	Route::get("pay/{bidid}",["as"=>"backend.payment.pay","uses"=>"Backend\PaymentController@pay"]);
	Route::post('pay/store',['as'=>"backend.payment.store","uses"=>"Backend\PaymentController@store"]);



});

