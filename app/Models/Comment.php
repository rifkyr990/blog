<?php

namespace App\Models;
// use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
// use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use Uuid;
    use HasFactory;
    // protected int $uuidVersion = 1;
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'comment',
    ];

    // /**
    //  * The "type" of the auto-incrementing ID.
    //  *
    //  * @var string
    //  */
    // protected $keyType = 'string';

    // /**
    //  * Indicates if the IDs are auto-incrementing.
    //  *
    //  * @var bool
    //  */
    // public $incrementing = false;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
