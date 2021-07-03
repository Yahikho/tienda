<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];

    public function product(){
        return $this->belongsToMany(Product::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    
}
