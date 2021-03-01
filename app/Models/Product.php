<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{


    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = ['id', 'name', 'slug', 'category_id', 'description', 'image', 'price', 'weight', 'status'];



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



}
