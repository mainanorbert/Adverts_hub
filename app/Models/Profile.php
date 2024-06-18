<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // public function getRouteKeyName(){
    //     return 'photo';
    // }


    protected $fillable=['name','location','phone','phone2','photo','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
 public function scopeMyprofile($query){
$query=$query->where('user_id',auth()->user()->id)->first();

return $query;
 }
}
