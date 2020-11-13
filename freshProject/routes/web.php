<?php

use Illuminate\Support\Facades\Route;

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

/*NAMED ROUTES:
can name routes in this file and then refer to them using

route('routeName', wildCardName)

this is great because you may actually change your route path
/articles/1
/web/articles/1

and it won't break references in other places of application.

Just remember to use route() method both in templates and controllers.
SEE EXAMPLE in /articles/{article}

*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ['articles' => App\Models\Article::latest()->take(2)->get()]);
});

Route:: get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.showMany');
//ORDER MATTERS FOR MATCHING! LOOK AT WILDCARD
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
//notice i check for HTTP method here
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');

//NOTICE COMMENTED OUT CODE BELOW
//when using route model binding, must represent primary key
//and must use same parameter name as 'variable name' in route
//to edit you will need to GET the form, then use PUT in the form's method
Route::get('articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::put('/articles/{article}', '\App\Http\Controllers\ArticlesController@update');
//notice how about.blade.php changed
//Jeffrey way suggests adding a method to each model that returns a string "->path()"
//that includes route('...')
//that is cleaner than route('....')
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('articles.showSingle');
/*
Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::put('/articles/{id}', '\App\Http\Controllers\ArticlesController@update');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show');
*/

Route::get('/test', function () {
	$dataDict = ['gfName' => request('gfName')];

    return view('test', $dataDict);
});

Route::get('/posts/{slug}', 'App\Http\Controllers\PostsController@show');

