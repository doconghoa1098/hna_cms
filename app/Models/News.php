<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'content',
        'author_id'
    ];

    public function user(){
        
        return $this->belongsTo(User::class, 'author_id');
    }
}
