<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bidding;
use Servicetypes;


class Services extends Model
{
    protected $table = 'services';

    protected $fillable = ['servicetypes_id','bidding_id','name'];

    public $timestamps = false;

    public function bidding()
	{
		return $this->belongsTo(Bidding::class);
	}

	public function servicetypes()
	{
		return $this->belongsTo(Servicetypes::class);
	}
	
}
