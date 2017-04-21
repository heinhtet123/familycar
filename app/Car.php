<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\User;
use App\Type;
use App\CarModel;
use App\Bidding;

class Car extends Model
{
    protected $table = 'car';

    protected $fillable = ['user_id','model_id','status','end_bidding_time',"transmission","numberof_cylinders","color","fuel_type","engine","floor_price"];

    public $timestamps = false;

    public function brand()
	{
		return $this->belongsTo(Brand::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function model()
	{
		return $this->belongsTo(CarModel::class,"model_id");
	}
	

	public function biddings()
	{
		return $this->hasMany(Bidding::class,'car_id'); 
	}

}
