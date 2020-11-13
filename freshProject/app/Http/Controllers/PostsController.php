<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//don't forget to include model definition
use App\Models\Post;

class PostsController extends Controller
{
	public function show($slug){

		//retrieve record from db AS OBJECT where column matches $postnum
		//and retrieve first match. 
		//$post = \DB::table('posts')->where('slug', '=', $slug)->first(); 
		

		//slightly cleaner using Model to CRUD DB
		//$post = Post::where('slug', '=', $slug)->first(); 

		
		//even cleaner, allowing us to check to see if we were able to
		//retrieve DB record
		//$post = Post::where('slug', '=', $slug)->firstOrFail(); 

		//'dump and die' print val of var for debugging
		//dd($post)

		//using local variables for controller data instead of DBs
		/*
		$postContentArr = [
			'1' => 'THIS IS MY FIRST POST',
			'2' => 'THIS IS MY SECOND POST'
		];

		if (! array_key_exists($postNum, $postContentArr)){
			return abort(404, 'this post does not exist'); 
		}
		
		 */

		return view('showPost', ['post' => Post::where('slug', '=', $slug)->firstOrFail()]);
	}
}
