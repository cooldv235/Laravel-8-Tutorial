<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Str;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    // public function index()
    // {
        // DISPLAY RECORDS
        // $posts = Post::get(); TO GET ALL RECORDS
        // $post = Post::where('id',1)->get();     // TO GET ONE SPECIFIC RECORD
        // $posts = Post::all()->where('user_id',2);   // TO GET ALL RECORDS OF ONE SPECIFIC USER
        // dd($posts);
    // }

    // THIS FUNCTION index FOR HAS MANY
    public function index()
    {
        // $posts = User::find(2)->posts;
        // dd($posts);

        // GET POSTS WITH TAGS
        // $posts = Post::with('tags')->get();

        // return view('index',compact('posts'));
        // return $posts;

        $tags = Tag::with('posts')->get();
        return view('index',compact('tags'));
        
    }

    // THIS FUNCTION many FOR MANY TO MANY RELATION
    public function many()
    {
        // $post = Post::create([
        //     'title' => $title = 'Yii2 is one of my Favorite PHP Framework.',
        //     'body' => 'Yii2 is a very popular MVC PHP Framework that has very powerful tools like Gii',
        //     'slug' => Str::slug($title),        // NOT AN ERROR
        //     'user_id' => 2
        // ]); 

        // $tag = Tag::find(6);

        // $tag_1 = 4;
        // $tag_2 = 5;
        // $tag_3 = 6;

        // $post->tags()->attach([$tag_1,$tag_2]);     // TO ATTACH TAGS ON A POST
        // $post->tags()->detach([$tag_1,$tag_2]);     // TO DETACH/REMOVE TAGS FROM A POST

        $post = Post::find(7);
        // $tag = Tag::find(7);

        // $post->tags()->attach($tag); 
        // $post->tags()->sync([7,8]);
        $post->tags()->syncwithOutDetaching(7);     // IT DOES NOT ADD DUPLICATE RECORD LIKE attach DOES
    }
    
    public function show($id)
    {
        // DISPLAY A SINGLE RECORD
        $post = Post::find($id);        // TO FETCH RECORD
        // $post Post::findOrFail($id)      // TO FETCH RECORD OR IF FAILED SHOW ERROR
        dd($post);
    }

    public function store()
    {
        // SAVE THE POST RIGHT NOW HARDCODING
        // $post = new Post();
        // $post->title = "A new Post";
        // $post->body = "This is the body of the new post.";
        // $post->slug = Str::slug($post->title);
        // $post->user_id = 1;
        // $post->save();

        // A BETTER WAY THAN ABOVE (MASS ASSIGNMENT)
        Post::create([
            'title' => $title = 'This is the title.',
            'body' => 'This is the body of the title.',
            'slug' => Str::slug($title),
            'user_id' => 2
        ]);     // BUT IN THIS WAY, YOU HAVE TO ALSO MENTION $fillable AREA IN ITS MODEL
    }   
    
    public function update($id)
    {
        // UPDATE A SINGLE RECORD
        // $post = Post::find($id);
        // $title = $post->title = "Updated Title";
        // $post->body = "Updated Body of Post";
        // $post->save();

        // OR A BETTER WAY : -
        Post::where('id',$id)->update([
            'title' => "New Updated Title Hell Yeah!!!",
            'body' => "This is Freaking Amazing!!!"
        ]);
    }

    public function destroy($id)
    {
        // DELETE A SINGLE RECORD
        $post = Post::find($id);
        $post->delete();
    }

    public function getPost($id)
    {
        $post = Post::where('id',$id)->first();    // TO FETCH FIRST MATCHING RECORD ONLY
        dd($post);
    }
    
}
