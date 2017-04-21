<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bidding;

class Invoice extends Model
{
    protected $table = 'invoice';

	protected $fillable = ['bidding_id','payment_id','payment_date','fees','quantity','bank_account_id'];

	public $timestamps = false;

	public function invoice()
	{
		return $this->belongsTo(Bidding::class);
	}
}
