<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['user_id',"car_id","fees","status","bankaccount"];

    public function user()
    {
    	return $this->belongsTo(User::class,"user_id");
    }
    
    public function car()
    {
    	return $this->belongsTo(User::class,"user_id");
    }

}