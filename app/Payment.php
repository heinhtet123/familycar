<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Car;
use App\Bidding;
class Payment extends Model
{
    protected $table = 'payment';
    
    protected $fillable = ['user_id',"car_id","bidding_id","fees","status","bankaccount"];

    public function user()
    {
    	return $this->belongsTo(User::class,"user_id");
    }
    
    public function car()
    {
    	return $this->belongsTo(Car::class,"car_id");
    }

    function bidding()
    {
        return $this->belongsTo(Bidding::class,"bidding_id");
    }
}