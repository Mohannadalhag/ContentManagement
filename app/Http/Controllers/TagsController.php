<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
{

    
    public function index() {
        //$tags = tag::take(5)->get() ;
        $tags = Tag::orderBy('id', 'desc')->paginate(5) ;
        $count = Tag::count();
        return view('tags.index', compact('tags','count'));
    }
    public function show($id) {
        $tag = Tag::find($id);
        return view('tags.show',compact('tag'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $tag = new Tag();
        $tag->name = $request->name ;
        $tag->save();
        return redirect('/tags')->with('status','tag was created !');
    }

    public function edit($id){
        $tag = Tag::find($id);
        return view('tags.edit',compact('tag'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name ;
        $tag->save();
        return redirect('/tags')->with('status','tag was update !');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/tags')->with('status','tag was deleted !');
    }
}
