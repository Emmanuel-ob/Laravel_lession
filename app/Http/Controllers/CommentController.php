<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{
    private $comment;
    private $article;
   
    public function __construct(Comment $commentModel, Article $articleModel){
        //parent::__construct();
        $this->comment = $commentModel;
        $this->article = $articleModel; 
    }
    
    public function submitcomment(Request $request, $article_id)
       {

		if($request->isMethod('post')){
			// dd($request);
			$this->validate($request, [
				'name'		=> 'required|min:3|alpha',
				'comment'	=> 'required|max:1000',
			]);

			try {

				$article_result = $this->article->findOrFail($article_id);

				$new_comment = new Comment([
					'name'				=> $request->name,
					'comment'			=> $request->comment,
				]);
				// dd($new_comment);
				$article_result->comments()->save($new_comment);

				\Session::flash('message', 'Comment Created!');

			} catch (ModelNotFoundException $e){
				abort("Article does not exist");
			}

		}

		return redirect()->back();
	}
}
