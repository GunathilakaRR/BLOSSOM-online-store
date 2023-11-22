<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;

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
        return view('user.showcart', compact('cart', 'user'));
    }


    public function deleteAddToCart($id){
        $data = cart::find($id);
        $data->delete();

        return redirect()->back();
    }


    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');

        if ($paymentMethod === 'card') {
            $user=auth()->user();

                $name = $user->name;
                $phone = $user->phone;
                $address = $user->address;
                $email= $user->email;

                    if (!is_null($request->product_title)) {
                        foreach($request->product_title as $key=>$productname){
                            $order = new order;

                            $order->product = $request->product_title[$key];
                            $order->price = $request->price[$key];
                            $order->quantity = $request->quantity[$key];
                            $order->CusName = $name;
                            $order->CusAddress= $address;
                            $order->Cusphone = $phone;
                            $order->CusEmail = $email;
                            $order->status = 'card';
                            $order->deliveryStat = 'not confirmed';

                            $order->save();
                        }
                    }


            $total_price = $request->grandTotal;

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $products = Cart::all();

            $lineItems = [];

            foreach($products as $product){

                $lineItems [] = [
                    [
                        'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [

                            'name' => $product->product_title,
                        ],
                        'unit_amount' => $total_price*100,
                        ],
                        'quantity' => 1,
                    ]
                ];
            }

            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('paymentSuccess', [], true),
                'cancel_url' => route('paymentCancel', [], true),
            ]);


            return redirect($checkout_session->url);
            }elseif ($paymentMethod === 'cash')
            {

                $user = auth()->user();

                $name = $user->name;
                $phone = $user->phone;
                $address = $user->address;
                $email = $user->email;

                if (!is_null($request->product_title)) {


                    foreach ($request->product_title as $key => $productname) {
                        $order = new Order;

                        $order->product = $request->product_title[$key];
                        $order->price = $request->price[$key];
                        $order->quantity = $request->quantity[$key];
                        $order->CusName = $name;
                        $order->CusAddress = $address;
                        $order->Cusphone = $phone;
                        $order->CusEmail = $email;
                        $order->status = 'cash';
                        $order->deliveryStat = 'not confirmed';

                        $order->save();

                    }

                }
                // return view('user.paymentSuccess');

            }   else {

                        return response()->json(['error' => 'Invalid payment method'], 400);
                }
        DB::table('carts')->where('phone', $phone)->delete();
        return view('user.paymentSuccess');
    }








    public function paymentSuccess(){
        return view('user.paymentSuccess');
    }


    public function paymentCancel(){
        return'fail';
    }



}









