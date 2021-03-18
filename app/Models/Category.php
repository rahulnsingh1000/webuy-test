<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','status'];

    public function getCreatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
	public function getUpdatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
}
