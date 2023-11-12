<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function product(){
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }


    public function uploadproduct(Request $request)
    {
        // Validate the request data before proceeding
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'desc' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new product instance
        $data = new Product;

        // Find the category by its ID
        $category = Category::findOrFail($request->categoryId);

        // Handle file upload (image)
        $image = $request->file('file');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);

        // Fill the product information
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        // Save the product to the database
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
        return redirect()->back();
    }

    public function deletecategory($id){
        $categories=Category::find($id);
        Product::where('category_id', $id)->delete();
        // $categories->delete();
        return redirect()->back();
    }


    public function updateproduct($id){
        $categories = Category::all();
        $data=product::find($id);

        return view("admin.updateproduct", compact('data', 'categories'));
    }


    public function modifyproduct(Request $request, $id){
        $data = product::find($id);
        $categories = Category::all();

        $image = $request->file;

        if($image){
        $imagename = time(). '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image=$imagename;
        }


        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', "Product updated successfully");
    }
}
