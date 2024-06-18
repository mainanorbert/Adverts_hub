<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $casts=['price'=>'int'];
    use HasFactory;

    protected $guarded=[];

public function getRouteKeyName(){
    return 'search_id';
}
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function cart(){
        $this->hasOne(Cart::class);
    }

    public function scopeTrendingPosts($query){
        $filter=request()->search1;
        // dd($filter);
        $query=$query->where('trending',true)->limit(9)->search($filter)->get();

        return $query;
    }

    public function scopeAllPosts($query){
        $filter=request()->search;
        $query=$query->where('trending',false)->search($filter)->get();

        return $query;

    }

    public function scopeSearch($query,$filter){
        if($query ??false){
            $query=$query->where('name','like','%'.$filter.'%')
            ->orWhere('brand','like','%'.$filter.'%');
        return $query;
        }
    }
}
