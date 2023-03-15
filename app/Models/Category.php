<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'nama_kategori',
    ];

    public function confirm(){
        return $this->hasMany(Confirmation::class, 'category_id', 'id');
    }

    // public function posts(){
    //     return $this->hasMany(Post::class, 'category_id', 'id');
    // }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories', 'post_id', 'category_id');
    }
}
