<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Brand;

class CarModel extends Model
{
    protected $table = 'model';

    protected $fillable = ['name','brand_id','year'];

    public $timestamps = false;

    public function brand()
    {
    	return $this->belongsTo(Brand::class,"brand_id");
    }

    public function cars()
    {
     	return $this->hasMany(Car::class,'model_id'); 
    }


}
