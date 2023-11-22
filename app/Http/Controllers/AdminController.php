<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\confirmEmail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function product(){
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }


    public function uploadproduct(Request $request)
    {
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'desc' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $data = new Product;
        $category = Category::findOrFail($request->categoryId);

        $image = $request->file('file');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);

        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $category->products()->save($data);
        return redirect()->back()->with('message', 'Product added successfully');
    }


    public function showproduct(){
        $data=product::all();
        $categories = Category::all();
        return view('admin.showproduct', compact('data', 'categories'));
    }


    public function deleteproduct($id){
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function deletecategory($id){
        $categories=Category::find($id);
        Product::where('category_id', $id)->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }


    public function updateproduct($id){
        $categories = Category::all();
        $data=product::find($id);



        return view("admin.updateproduct", compact('data', 'categories'));
    }


    public function modifyproduct(Request $request, $id){
        $data = product::find($id);

        $image = $request->file;

        if($image){
        $imagename = time(). '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image=$imagename;
        }


        $data->title = $request->title;
        $data->category_id = $request->categoryId;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', "Product updated successfully");
    }




    public function showorders(){

        $order = order::all();

        return view('admin.showorder', compact('order'));
    }



    public function updateorder(Request $request){

        $orderId = $request->id;
        $cusEmail = $request->CusEmail;


        $order = order::find( $orderId);
        $order->deliveryStat = 'Delivered';
        $order->save();

        Mail::to($cusEmail)->send(new confirmEmail($order));

            // Optionally, you can check if the email was sent successfully
            if (Mail::failures()) {
                // Handle the failure
            } else {
                // Email sent successfully
            }

        return redirect()->back();
    }
}
