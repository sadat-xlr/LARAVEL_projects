<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Routing\RouteRegistrar;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/about', function () {
//     return "about page";
// });
// Route::get('/contact', function () {
//     return "Contact page";
// });
// Route::get('/posts/{id}', function ($id) {
//     return "this is post no " . $id;
// });

//Route::get('/post', [PostsController::class, 'index']);
//Route::get('/post', 'PostsController@index');
Route::resource('posts', 'PostsController');


//laravel RAW SQL syntax start
Route::get('/insert', function () {
    DB::insert('insert into posts (title,description) values (?, ?)', ['New title', 'new description']);
});
Route::get('/read', function () {
    $results = DB::select('select * from posts');
    foreach ($results as $result) {
        dd($result);
    }
});
Route::get('/update', function () {
    DB::update('update posts set title = "updated title", description="Updated Description"  where id = ?', [1]);
});
Route::get('/delete', function () {
    DB::delete('delete from posts where id=?', [1]);
});
///////////SQL syntax finished/////////////////


//Eloquent Syntax Start (SELECT OR FIND)

Route::get('/findAll', function () {
    $posts = Post::all();
    foreach ($posts as $post) {
        return $post->title;
    }
});
Route::get('/findSingle', function () {
    $posts = Post::find(2);

    return $posts->description;
});
Route::get('/findwhere', function () {
    $posts = Post::where('id', 2)->orderBy('id', 'DESC')->take(1)->get();

    // $posts = Post::find(2);

    return $posts;
});
Route::get('/findOrFail', function () {
    $posts = Post::findOrFail(2);

    // $posts = Post::find(2);

    return $posts;
});
///insert with elooquent save method 
//save() method can be used to update and create 
Route::get('/eloSave', function () {
    $post = new Post();
    $post->title = "Title from save method";
    $post->description = "Description from Save method ";
    $post->save();
});
///insert with elooquent create method
Route::get('/eloCreate', function () {
    $post = new Post();
    $post->create([
        'title' => 'Eloquent Insert',
        'description' => 'Eloquent Description',
    ]);
});
Route::get('/eloUpdate', function () {
    $post = Post::find(4);
    $post->update([
        'title' => 'Eloquent title Update',
        'description' => 'Eloquent description Update',
    ]);
});
Route::get('/eloDelete', function () {
    Post::find(4)->delete();
    //Post::destroy(4);
    //Post::destroy([4,5]);
});

//softdelete
Route::get('/softDelete/{id}', function ($id) {
    Post::find($id)->delete();
});
Route::get('/readSoftDelete', function () {
    // $post = Post::find(5);
    // return $post;
    $post = Post::withTrashed()->get();
    return $post;
    // $post = Post::onlyTrashed()->get();
    // return $post;
});
Route::get('/restoreSoftDelete/{id}', function ($id) {

    Post::withTrashed()->where('id', $id)->restore();
});
Route::get('/deleteSoftDelete/{id}', function ($id) {

    Post::withTrashed()->where('id', $id)->restore();
});


////////////////////Eloquent Syntax(SELECT OR FIND) Finished //////////////////