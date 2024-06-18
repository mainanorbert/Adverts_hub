<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myfile extends Model
{
    use HasFactory;
    protected $fillable=['file_name','file_original_name','file_size','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
