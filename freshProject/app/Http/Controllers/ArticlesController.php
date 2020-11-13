<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

/*
 *RESTful controller methods
 * index : retrieve all
 * show : retriever single
 * create : get form to store
 * store : generate new
 * edit : get form to update
 * update : change state of existing
 * delete : ...
 */



/*
 * MODEL-ROUTE BINDING: put "ModelClass parameterName" as parameter of controller function
 * route must use same wildcard name as parameterName
 * can now refer to record retrieved using wildcard primary key without extra step of find(), get() etc
 * does find or fail automatically.
 */


/*
 * request->validate(dict)
 * returns validated dict!
 */


class ArticlesController extends Controller
{
	//render list
	public function index(){

	    //this technique allows us to list all articles associated with a certain tag
        //by grabbing the tag first and getting associated articles
	    if (request('tag')){
	        $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
	    else{
            $articles = Article::latest()->get();
        }
		return view('articles.show', ['articles' => $articles]);
	}

    //render single
    //NOTICE COMMENTED CODE BELOW.
    //route model binding only works when searching by primary key
    public function show(Article $article){
        //$article = Article::where('id', $articleID) ->get();

        //$article = Article::where('primaryKey','=', $articleID)->get();
        //$article = Article::findOrFail($article);
        return view('articles.showSingle', ['article' =>$article]);
    }

	/*
	//render single
	public function show($articleID){
		//$article = Article::where('id', $articleID)->get();

		//$article = Article::where('primaryKey','=', $articleID)->get();
		$article = Article::findOrFail($articleID);
		return view('articles.show', ['article' =>[$article]]);
	}
    */

	//create : show view to create new resource
	public function create(){
	    //notice passing all tags in through here so we can create
        //list of tag choices in create article form
		return view('articles.create', ['tags' => Tag::all()]);
	}

	//store : persist resource
	public function store(){
		//INPUT VALIDATION
        //request()->validate returns dict of validated data
        /*
		$validatedAttributes = request()->validate([
			'title' => 'required',
			'body'=> 'required',
			'excerpt' => ['required', 'max:20']
		]);
    */



		/*
		$a1 = new Article();
		$a1->title = request('title');
		$a1->body = request('body');
		$a1->excerpt = request('excerpt');
		$a1->save();
		*/

        //built-in method to create and save to db in 1 step.
        //replace below
        //Article::create($validatedAttributes);

        //BEST: use validator method we defined, create, store, pass in validated dict!
        //BEST
        //BEST
        //but for the sake of default value before authentication
        //using below
        //Article::create($this->validatedAttributes());

        //
        $this->validatedAttributes();

        //only get here if passed validation
        //CAN GET ASSOCIATED ARRAY FROM REQUEST!

        $article = new Article(request(['title', 'body', 'excerpt']));
        $article->user_id = 1;
        $article->save();

        //ATTACH MANY TO MANY single
        //$article->tags()->attach(1)

        //ATTACH MAHY TO MANY multiple
        //$article->tags()->attach([1,3,5])

        //ATTACH MANY TO MANY using request
        $article->tags()->attach(request('tags'));



        return redirect('/articles');
	}

    //edit : show a view to edit a resource
    public function edit(Article $article){
        return view('articles.edit', ['article'=>$article]);
    }
/*
	//edit : show a view to edit a resource
	public function edit($id){
		return view('articles.edit', ['article'=>Article::findOrFail($id)]);

	}
*/


	//update : persist changes to existing resource from edit
	public function update(Article $article){

	    //see create for why this works
	    $article->update($this->validatedAttributes());

		/*


        //INPUT VALIDATION
		request()->validate([
			'title' => 'required',
			'body'=> 'required',
			'excerpt' => ['required', 'max:20']
		]);

		$article->title = request('title');
		$article->body = request('body');
		$article->excerpt = request('excerpt');
		$article->save();
        */
		return redirect('/articles/' . $article->id);
	}
	public function path(){
	    return route('articles.showSingle', $this);
	}

	//destroy : delete a resource
	public function delete(){

	}

	//HELPER METHOD TO VALIDATE ALL FIELDS FROM REQUEST FOR THIS MODEL
    protected function validatedAttributes(){
	    return request()->validate([
	            'title' => 'required',
                'body' => 'required',
                'excerpt' => ['required', 'max:20'],
                //can see if entry exists in a table by column name
                'tags' => 'exists:tags,id'
            ]);
    }

}
