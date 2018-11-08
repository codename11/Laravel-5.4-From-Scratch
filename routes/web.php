<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome', [
        "name" => "Veljko",
    ]);
});*/

/*Route::get('/', function () {
    return view('welcome')->with("name", "Veljko");
});*/

/*Route::get('/', function () {
    $name = "Veljko";
    return view('welcome', ["name" => $name]);
});*/

/*Route::get('/', function () {
    $name = "Veljko";
    $age = 36;
    return view('welcome', compact("name", "age"));
});*/

/*Route::get('/', function () {
    $tasks = [
        "Go to the store",
        "Finish my screencast",
        "Clean the house"
    ];
    
    return view('welcome', compact("tasks"));
});*/

//Version1
//Route::get('/', function () {
    /*Poziva se klasa DB koja je integrisana u Laravelu,
    koji uzima tabelu 'tasks'.*/
    //$tasks = DB::table("tasks")->latest()->get();
    //return $tasks;
    //return view('welcome', compact("tasks"));
//});

/*Version1
Route::get('/tasks', "TasksController@index");
*/

//Route::get('/tasks', function () {
    /*Poziva se klasa DB koja je integrisana u Laravelu,
    koji uzima tabelu 'tasks'.*/
    //$tasks = DB::table("tasks")->latest()->get();
    /*Identicno je kao ovo gornje.*/
    //$tasks = App\Task::all();
    //return $tasks;
    //return view('tasks.index', compact("tasks"));
//});
/*Version1
Route::get('/tasks/{task}', "TasksController@show");
*/
//*Gornje nadje ceo objekat, donje samo id.*/ 
//Route::get('/tasks/{tasks}', "TasksController@show");
//Route::get('/tasks/{tasks}', function ($id) {
    /**/
    //dd($id);
    //$task = DB::table("tasks")->find($id);
    //$task = Task::find($id);
    //dd($task);
    //return $tasks;
    //return view('tasks.show', compact("task"));
//});
/* Version1
Route::get('/about', function () {
    return view('about');
});
*/

Route::get('/', "PostsController@index");
Route::get('/posts/{post}', "PostsController@show");