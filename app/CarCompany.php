<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;


class CarCompany extends Model
{
    protected $table = 'carcompany';

    protected $fillable = ['name'];

    public $timestamps = false;


     public function brands()
     {
     	return $this->hasMany(Brand::class,'car_company_id'); 
     }
}
