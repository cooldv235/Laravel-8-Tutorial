<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;


class Post extends Model
{
    use HasFactory;

    // IN CASE THE NAMES OF MODEL AND MIGRATION IS DIFFENT ,
    // THEN MENTION THE TABLE NAME IN MODEL LIKE THIS
    // protected $table = "articles";      // LETS ASSUME THE TABLE WE WANT TO ASSOCIATE WITH THIS MODEL IS articles
    // BUT IF THE MODEL NAME IS SINGULAR -> Post and MIGRATION = posts THEN NO NEED TO MENTION EXPLICITLY.

    // protected $fillable = [
    //     'title',
    //     'body',
    //     'slug',
    //     'user_id'
    // ];

    // OR you can use $guarded[]
    protected $guarded = [];        // IN THIS YOU DONT HAVE TO SPECIFY COLUMNS EXPLICITYL, AND IF YOU DO LARAVEL WILL NOT INSERT DATA IN THAT COLUMN

    public function user()
    {
        // A POST OR POSTS BELONGS TO A USER
        return $this->belongsTo(User::class);
    }

    // MANY TO MANY RELATIONSHIP posts -> tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);

        // IF TABLE NAMES IS NOT ACCORDING TO THE  LARAVEL CONVENTION
        // YOU HAVE TO SPECIFY THE TABLE NAME EXPLICITLY LIKE
        // return $this->belongsToMany(Tag::class,'table_name','post_id','tag_id');

    }


}
