<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    protected $fillable = ['address_line1','user_id','address_line2','address_line3','pincode','city','state','country','status'];

   	public function getCreatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
	public function getUpdatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
}
