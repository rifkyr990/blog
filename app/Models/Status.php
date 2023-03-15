<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_status',
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'status_id', 'id');
    }
}
