<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CarCompany;
use App\Car;
use App\CarModel;

class Brand extends Model
{
    protected $table = 'brand';

    protected $fillable = ['name','car_company_id'];

    public $timestamps = false;

    public function carcompany()
	{
		return $this->belongsTo(CarCompany::class,"car_company_id");
	}

    public function carmodels()
    {
        return $this->hasMany(CarModel::class,'brand_id'); 
    }

	public function cars()
    {
     	return $this->hasMany(Car::class,'brand_id'); 
    }
}
