<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
class PostsController extends Controller
{

    public function __construct()
    {   /*Postavi autorizaciju za sve osim za index i show, 
        odnosno za pronalazenje i prikazivanje.*/
        $this->middleware('auth')->except(['index', 'show']);
        /*Ovo znaci da ce traziti autorizaciju 
        za sve operacije, osim za indeksiranje 
        i prikazivanje postova. Dakle svako moze da 
        gleda postove, ali samo trenutno ulogovani 
        korisnik moze editovati i brisati 
        i to samo svoje postove.*/
    }

    public function index(){

        //return view("posts.index");
        //$posts = Post::orderBy("created_at","desc")->get();
        /*Donje i gornje su isto.*/
        $posts = Post::latest();

        /*if($month = request("month")){
            //Filtrira upit po mesecu u get parametru.
            $posts->whereMonth("created_at",Carbon::parse($month)->month);
        }

        if($year = request("year")){
            //Filtrira upit po godini u get parametru.
            $posts->whereYear("created_at",Carbon::parse($year));
        }*/
        if(request("month")){
            /*Filtrira upit po mesecu u get parametru.*/
            $posts->whereMonth("created_at",Carbon::parse(request("month"))->month);
        }

        if(request("year")){
            /*Filtrira upit po godini u get parametru.*/
            $posts->whereYear("created_at",Carbon::parse(request("year")));
        }
        $posts = $posts->get();
        /*Ovo(gornje) i ovo donje je isto, ali samo ako u Post modelu ima funkcija scope filter.*/
        //$posts = Post::latest()->filter(request(["month","year"]))->get();
        /*Ovo(gornje) vazi samo ako u Post modelu ima funkcija scope filter.*/
        $archives = Post::selectRaw("year(created_at) as year, monthname(created_at) as month, count(*) as published")->groupBy("year","month")->orderByRaw("min(created_at) desc")->get()->toArray();
        //dd($archives);
        return view("posts.frontpage", compact("posts","archives"));
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
        Post::create([
            "title" => request('title'), 
            "body" => request('body'), 
            "user_id" => auth()->user()->id
        ]);
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
