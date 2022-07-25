<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function index(Request $request){
        $cats = Category::All();

        if (!$request->category) {
            $cat1 = "Ana Sayfa";

            $meals = Meal::all();
            return view('visitorPage', compact('meals', 'cats', 'cat1'));
        } else {
            $cat1 = $request->category;
            $meals = Meal::where('category', $request->category)->get();
            return view('visitorPage', compact('meals', 'cats', 'cat1'));
        }
    }
}
