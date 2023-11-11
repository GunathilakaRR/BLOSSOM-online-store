<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'category_id',
        'price',
        'description',
        'quantity',
        'image'
    ];


    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
