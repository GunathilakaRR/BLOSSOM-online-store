<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            $data=product::all();
            return view('admin.dashboard', compact('data'));
        }else{
            $data = product::paginate(6);
            return view('user.home', compact('data'));
        }
    }


    public function index(){

        if(Auth::id()){
            return redirect('redirect');
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


}
