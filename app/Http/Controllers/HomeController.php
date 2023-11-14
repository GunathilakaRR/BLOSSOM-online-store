<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            $data=product::all();
            return view('admin.dashboard', compact('data'));
        }else{
            $data = product::all();
            return view('user.home', compact('data'));
        }
    }


    public function index(){

        if(Auth::id()){
            $data=product::all();
            $categories = Category::all();
            return view('user.home', compact('data', 'categories'));
            // return redirect('redirect');
        }else{

            $data = product::paginate(6);
            return view('user.home', compact('data'));
        }

    }


    public function search(Request $request){
        $search= $request->search;

        $data = product::where('title','Like', '%'.$search.'%')->get();
        return view('user.home', compact('data'));
}



    public function addToCart(Request $request, $id){
        if(Auth::id()){
            $user = auth()->user();
            $product = product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->product_category = $product->category->category_name;
            $cart->price = $product->price;

            $cart->save();
            return redirect()->back()->with('message', 'Product Added Successfully');
        }else{
            return redirect('login');
        }
}



public function showcart(){

    $user = auth()->user();
    $cart = cart::where('phone', $user->phone)->get();
    return view('user.showcart', compact('cart'));
}


public function deleteAddToCart($id){
    $data = cart::find($id);
    $data->delete();

    return redirect()->back();
}


}
