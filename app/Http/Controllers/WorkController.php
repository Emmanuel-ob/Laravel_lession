<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class WorkController extends Controller
{
   private $article;
       
    public function __construct(Article $article){
        $this->article = $article; 
         
    }

    public function index()
    {
         $articles = $this->article->all();
        //$articles = Article::all(); 

        //dd($articles); 
        return view('articles.work-index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            //dd($request->title);
            $this->validate($request, [
                'title'      => 'required|min:3',
                'body'   => 'required|max:1000',
            ]);

            try {

                #$article_result = $this->article->findOrFail($article_id);

                $new_article = new Article([
                    'title'          => $request->title,
                    'body'           => $request->body,
                    'slug'           => $request->title,
                ]);
                // dd($new_comment);
                $article_result = $new_article->save();


                \Session::flash('message', 'New Article Created!');

            } catch (ModelNotFoundException $e){
                abort("Article was not saved");
            }

        }

        return redirect()->back();
    
    }

    public function show($id)
    {
        $article = $this->article->where( $id)->first();
        #$comment = $this->article->where('article_id', $this->article->id);
        if (!$article){
               abort("Article not found", 404);
        }
        
        return view('articles.view-article', compact('article', 'comment'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        #$comment = $this->article->where('article_id', $this->article->id);
        if (!$article){
               abort("Article not found", 404);
        }
        
        return view('articles.work-article', compact('article'));
    }

    
    public function update(Request $request, $id)
    {
        
        if($request->isMethod('post')){
            
            $this->validate($request, [
                'title'      => 'required',
                'body'   => 'required',
            ]);
            try {

                $article_result = $this->article->where('id',$id)->first();
                //$article_result = $this->article->findOrFail($id);
                                
                    $article_result->title   = $request->title;
                    $article_result->body    = $request->body;
                    $article_result->slug   = $request->title;
                

                // dd($new_comment);
                 $article_result->save();
                // $update_article->fill($new_article)->save();

                \Session::flash('message', 'Article was updated successfully!');

            } catch (ModelNotFoundException $e){
                abort("Article was not updated");
            }

        }
        return redirect()->back();
        #return view('articles.work-index', compact('articles'));
    }

    public function destroy($id)
    {
         
    $article = Article::findOrFail($id);

    $article->delete();

    \Session::flash('message', 'Article successfully deleted!');

    #return redirect()->route('tasks.index');
    #return view('articles.index');
    #return redirect()->route('articles.index');
    return redirect()->back();
    }
}
