<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'name', 'code', 'price', 'image', 'maker_id', 'content' ];

    public function maker()
    {

        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories', 'product_id', 'category_id');
    }
}
