<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(auth()->user()->is_admin == 1){
            $order = Order::orderBy('id', 'DESC')->get();
            return view('AdminPage', compact('order'));
        }
        $cats = Category::All();
        if(!$request->category){
            $cat1 = "Ana Sayfa";
            
            $meals = Meal::all();
            return view('UserPage', compact('meals', 'cats', 'cat1'));
        }else{
            $cat1 = $request -> category;
            $meals = Meal::where('category', $request->category)->get();
            return view('UserPage', compact('meals','cats', 'cat1'));
        }
        
    }
    public function orderStore(Request $request){
        Order::insert([
            'user_id' => Auth()->user()->id,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'meal_id' => $request->meal_id,
            'qty' => $request->qty,
            'address' => $request->address,

            'status' => 'Onaylanıyor'
            
        ]);
        $notification = array(
            'message_id' => 'Sipariş Başarılı Bir Şekilde Gerçekleşti',
            'alert-type' => 'success'
        );
        return redirect()->route('home')->with($notification);
    }

    public function show_order(){
        $id = Auth::user()->id;
        $order = Order::where('user_id', $id)->get();

        return view('order.show_order', compact('order'));
    }

    public function changeStatus(Request $request, $id){
        $order = Order::find($id);
        Order::where('id', $id)->update(['status'=>$request->status]);
        return back();
    }
}
