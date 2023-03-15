<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'slug',
        'author',
        'tanggal',
        'category_id',
        'content',
        'foto',
        'user_id',
    ];
    
    public function category()
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function postCategory()
    {
        return $this->hasMany(PostCategory::class);
    }
}
