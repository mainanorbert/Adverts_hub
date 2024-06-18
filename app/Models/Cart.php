<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['user_id','device_id','item_count','time','time_expiry'];

    public function product(){

        return $this->belongsTo(Device::class,'device_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeCartItems($query){
        $query=$query->where('user_id',auth()->user()->id)->sum('item_count');

        return $query;
    }

    // public function scopeItemsPrice(){
    //     $price=Cart::where('user_id',auth()->user()->id)->get();
    // }
}
