<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class ArticlesController extends Controller
{
    private $article;
    private $comment;
   
    public function __construct(Article $article, Comment $comment){
        $this->article = $article; 
        $this->comment = $comment; 
    }
    
    public function index(){
        
        $articles = $this->article->all();
        //$articles = Article::all(); 

        //dd($articles); 
        return view('articles.index', compact('articles'));
    }

    public function view($slug){
        
        $article = $this->article->where('slug', $slug)->first();
        $comment = $this->article->where('article_id', $this->article->id);
        // if (!$article){
        //        abort("Article not found", 404);
        // }
        
        return view('articles.view-article', compact('article', 'comment'));
    }

    public function submitcomment(Request $request)
	{
		// $article = $this->article->where('id', $request->id)->first();

		// $comment = $this->comment->create($request, [
		// 	'article_id'		=> $request->article_id,
		// 	'name'				=> $request->name,
		// 	'comment'			=> $request->comment,
		// ]);

		// $comment->save();

		// Or try

		if($request->isMethod('post')){

			$this->validate($request->all(), [
				'name'	=> 'required|min:3|alpha',
				'text'	=> 'required|max:1000',
			]);

		}

		return redirect()->back();
	}
}
