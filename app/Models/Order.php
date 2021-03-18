<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id','user_id','product_id','quantity','price','total','address','current_status'];

   	public function getCreatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
	public function getUpdatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
}
