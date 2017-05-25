<?php 

namespace App\Http\Repositories;
/**
* 
*/
class BookingRepositories
{
	public function daysleft($endtime)
    {
    	
    	$datetime1 = new \DateTime($endtime);
    	$datetime2 = new \DateTime(date("Y-m-d H:i:s"));
    	$interval = $datetime1->diff($datetime2);
		return $interval->format('%a days %h hours %i minutes %s seconds');

    }
}