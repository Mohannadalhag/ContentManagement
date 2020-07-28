<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    
    
    public function index() {
        //$categories = Category::take(5)->get() ;
        $categories = Category::orderBy('id', 'desc')->paginate(5) ;
        $count = Category::count();
        return view('categories.index', compact('categories','count'));
    }
    public function show($id) {
        $category = Category::find($id);
        return view('categories.show',compact('category'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $category = new category();
        $category->name = $request->name ;
        $category->save();
        return redirect('/categories')->with('status','category was created !');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $category = Category::find($id);
        $category->name = $request->name ;
        $category->save();
        return redirect('/categories')->with('status','category was update !');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories')->with('status','category was deleted !');
    }
}
