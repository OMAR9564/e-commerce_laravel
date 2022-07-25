<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; 

class CategoryController extends Controller
{
    public function show(){
        $cats = Category::all();
        return view('caregory.CategoryPage', compact('cats'));
    }

    public function store(Request $request){
        $request->validate(['cat_name' => 'required|string|unique:categories|min:2|max:40',]);

        Category::insert([
            'cat_name' => $request->cat_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message', 'Başarılı Bir Şekilde Eklendi');
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect()->route('cat.show')->with('message', 'Başarılı bir şekilde silindi');
    }
    public function update(Request $request){
        $request->validate([
            'cat_name' => 'required|string|unique:categories|min:2|max:40',]);
            $id = $request->id;
            Category::findOrFail($id)->update([
                'cat_name'=>$request->cat_name,
            ]);
            return redirect()->route('cat.show')->with('message', 'Başarılı bir şekilde düzeldi');
    }
}
