<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Servicetypes extends Model
{
    protected $table = 'servicetypes';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function services()
     {
     	return $this->hasMany(Services::class,'servicetypes_id'); 
     }
}
