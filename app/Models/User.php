<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profiles;
use App\Models\Post;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ONE TO ONE RELATIONSHIP 
    public function profiles()
    {
        return $this->hasOne(Profiles::class);

        // IN CASE THE NAME OF THE COLUMN IS DIFFERENET FROM user_id, THEN
        // YOU WILL HAVE TO DEFINE IT EXPLICITLY AS SHOWN BELOW
        // return $this->hasOne(Profiles::class,'u_id','id');

    }

    public function posts()
    {
        // A USE CAN HAVE MANY POSTS
        // HAS MANY RELATIONSHIP
        return $this->hasMany(Post::class);
    }
}
