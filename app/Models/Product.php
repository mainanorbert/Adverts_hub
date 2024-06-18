<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts=['price'=>'int'];

    use HasFactory;
    protected $fillable=['user_id','name','brand','description','price','trending','search_id'];

    public function getRouteKeyName(){
        return 'search_id';
    }


    public function uploads(){

        return $this->hasMany(Myfile::class);

    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeTrendingPosts($query){
        $search=request()->search1;
        $query=$query->where('trending',true)->limit(5)->filters($search)->get();
        if(count($query)==0){
            $query=Product::latest()->limit(5)->filters($search)->get();
        }

        return $query;

    }
    public function scopeAllPost($query){
        $search=request()->search;
       $query=$query->where('trending',false)->latest()->filters($search)->get();
       return $query;
    }

    public function scopeFilters($query, $search){
        
        if($search ??false){
            $query->where('name','like','%'.$search.'%')
            ->orWhere('brand','like','%'.$search.'%');
        }
        return $query;

    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }
   
}
