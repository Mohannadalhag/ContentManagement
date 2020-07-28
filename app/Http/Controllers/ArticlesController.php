<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Tag;
use App\Category;
use App\ArticleCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\ArticleTag;
class ArticlesController extends Controller
{
    
    
    public function index() {
        $articles = Article::orderBy('id', 'desc')->paginate(5) ;
        $count = Article::count();
        return view('articles.index', compact('articles','count'));
    }
    public function show($id) {
        $article = Article::find($id);
        $categories = $article->articleCategories()
                ->select('categories.name')
                ->join('categories','article_categories.category_id','=','categories.id')
                ->get();
        
        $tags = $article->articleTags()
                ->select('tags.name')
                ->join('tags','article_tags.tag_id','=','tags.id')
                ->get();
        $image = $article->image;
        return view('articles.show',compact('article','categories','tags','image'));
    }

    public function create() {
        $tags = Tag::orderBy('id', 'desc')->get()->all();
        $categories = Category::orderBy('id', 'desc')->get()->all();

        return view('articles.create',compact('tags','categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:20',
            'content'  => 'required|max:30'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $article = new article();
        $article->title = $request->title ;
        $article->content = $request->content;
        $article->image = $imageName;
        $article->user_id = auth()->user()->id;
        $article->save(); 

        $categories = $request->data['categories'];
        $tags = $request->data['tags'];
        foreach ($categories as $index => $category){
            $articlecategory = new ArticleCategory();
            $articlecategory->article_id = $article->id;
            $articlecategory->category_id = $category;
            $articlecategory->save();
        }
        foreach ($tags as $index => $tag){
            $articletag = new ArticleTag();
            $articletag->article_id = $article->id;
            $articletag->tag_id = $tag;
            $articletag->save();
        }
        
        return redirect('/articles')->with('status','article was created !');
    }

    public function edit($id){
        $tags = Tag::orderBy('id', 'desc')->get()->all();
        $categories = Category::orderBy('id', 'desc')->get()->all();

        return view('articles.edit',compact('id','tags','categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:20',
            'content'  => 'required|max:30'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $article = new article();
        $article->title = $request->title ;
        $article->content = $request->content;
        $article->image = $imageName;
        $article->user_id = auth()->user()->id;
        $article->save(); 

        $categories = $request->data['categories'];
        $tags = $request->data['tags'];
        foreach ($categories as $index => $category){
            $articlecategory = new ArticleCategory();
            $articlecategory->article_id = $article->id;
            $articlecategory->category_id = $category;
            $articlecategory->save();
        }
        foreach ($tags as $index => $tag){
            $articletag = new ArticleTag();
            $articletag->article_id = $article->id;
            $articletag->tag_id = $tag;
            $articletag->save();
        }
        return redirect('/articles')->with('status','article was update !');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('status','article was deleted !');
    }
}