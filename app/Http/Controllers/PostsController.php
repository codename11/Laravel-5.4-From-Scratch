<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    public function index(){

        //return view("posts.index");
        //$posts = Post::orderBy("created_at","desc")->get();
        /*Donje i gornje su isto.*/
        $posts = Post::latest()->get();
        return view("posts.frontpage", compact("posts"));

    }

    public function show(Post $post){
        //return $id;
        
        return view("posts.show", compact("post"));

    }

    public function create(){

        return view("posts.create");

    }

    public function store(){
        
        /*Ovako se vrsi validacija sa servera.*/
        $this->validate(request(),[
            "title" => "required|max:16",
            "body" => "required|max:255|min:6"
        ]);

        //return request()->all();
        //return request("title");
        //return request(["title","body"]);
        // Create a new post using request data
        $post = new Post;
        /*
        $post->title=request("title"); 
        $post->body=request("body"); 
        $post->save();
        Isto je kao donje.*/
        /*Post::create([
            "title" => request("title"),
            "body" => request("body")
        ]);*/
        /*Isto je kao gornje.*/
        Post::create(request(["title", "body"]));
        /*Mass-assigment: Ako se ovako 
        koristi sa 'create', onda se mora u modelu 'Post'
        navesti ono fillable ili guarded 
        sa imenima polja title i body li kojim vec.*/
        //return $post;
        // Save it to database

        // And then redirect to home page
        return redirect("/posts/create");
    }
}
