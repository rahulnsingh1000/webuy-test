<?php
 
namespace App\Models;
use Carbon\Carbon;
 
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
   	protected $fillable = ['title','category_id','description','image','price'];

   	public function getCreatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
	public function getUpdatedAtAttribute($value){
	    $date = Carbon::parse($value);
	    return $date->format('Y-m-d H:i');
	}
 
}