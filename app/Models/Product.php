<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use Symfony\Component\VarDumper\Caster\ImgStub;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_up'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable' );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
