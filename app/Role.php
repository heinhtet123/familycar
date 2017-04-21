<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function user()
     {
     	return $this->hasMany(User::class,'role_id'); 
     }
}
