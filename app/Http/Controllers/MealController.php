<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// use App\Http\Controllers\Meal;
// use Intervention\Image\Facades\Image;
// use App\Http\Controllers\Image;
use App\Models\Meal;
use Faker\Provider\Image as ProviderImage;
use Image;

class MealController extends Controller
{
    public function create(){
        $cats = Category::latest()->get();
        return view('meal.create_meal', compact('cats'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:40',
            'description' => 'required|min:2|max:500',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,jpg',

        ]);
        $image = $request->file('image'); //$image = clinic.jpg
        $name_gen = hexdec(uniqid() . '.' . $image->getClientOriginalExtension()); //$name_gen = 234234234234.jpg
        $extention = $image->extension();
        Image::make($image)->resize(300, 300)->save('upload/Meals/' . $name_gen . '.' . $extention);
        $save_url = 'upload/Meals/' . $name_gen . '.' . $extention;
        Meal::insert([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $save_url,
        ]);
        $notification = array(
            'message_id' => 'Yemek Başarı Bir Şeilde Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function index(){
        $meals = Meal::paginate(3);
        return view('meal.index', compact('meals'));
    }
    public function edit($id){
        $meal= Meal::find($id);
        $cats = Category::latest()->get();
        return view('meal.edit_meal', compact('meal', 'cats'));
    }
    public function update(Request $request, $id){
        $old_img = $request->old_image;

        if($request->file('image')){
        
            unlink($old_img); // eski fotoğrefı silmek için

            $image = $request->file('image'); //$image = clicnic.png
            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
            $extention = $image->extension();

            Image::make($image)->resize(300,300)->save('upload/Meals/' . $name_gen . '.' . $extention);

            $save_url = 'upload/Meals/' . $name_gen . '.' . $extention;

            Meal::findOrFail($id)->update([
                'category' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $save_url,
            ]);
            return redirect()->route('meal.index')->with('message', 'Başarılı Bir Şekilde Düzenlendi');
        }
        else{
            Meal::findOrFail($id)->update([
                'category' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
            return redirect()->route('meal.index')->with('message', 'Başarılı Bir Şekilde Düzenlendi');
        }
    }
    public function show_details($id){
        $meal = Meal::findOrFail($id);

        return view('meal.meal_details', compact('meal'));
    }
}
