<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price','size','brand', 'category_id', 'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function materials(){
        return $this->belongsToMany(Material::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
