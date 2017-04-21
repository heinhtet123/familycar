<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Invoice;
use App\User;
use App\Services;


class Bidding extends Model
{
	protected $table = 'bidding';

	protected $fillable = ['car_id','time','status','user_id'];

	public $timestamps = false;

	public function cars()
	{
		return $this->belongsTo(Car::class);
	}

	 public function invoice()
     {
     	return $this->hasMany(Invoice::class,'bidding_id'); 
     }

     public function services()
     {
     	return $this->hasMany(Services::class,'bidding_id'); 
     }
    
}
