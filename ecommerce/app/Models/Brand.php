<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    
    protected $fillable = [
        'name',
        'slug',
        'status',
        'category_id'
    ];
    function category(){
        return $this->belongsTO(Category::class, 'id', 'id');
    }

    function products(){
        return $this->hasMany(Product::class, 'id', 'id');

    }
}
