<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;

    protected $fillable=[
        'title',
        'article',
        'user_id',
        'category'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
