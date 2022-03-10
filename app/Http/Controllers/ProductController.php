<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
   
    public function index() {
        $product = Product::with('task')->get();
       return view('product.index', compact('product'));
         }
     public function insert(Request $request) {
            //   $request->validate([
            //      'name' => 'required',
            //      'detail' => 'required',
            //      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //  ]);
       
            //  $input = $request->all();
       
            //  if ($image = $request->file('image')) {
            //      $destinationPath = 'image/';
            //      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //      $image->move($destinationPath, $profileImage);
            //      $input['image'] = "$profileImage";
            //  }
         
            //  Product::create($input);
            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
           if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $product->image = $profileImage;
           }
            // if($request->hasFile('image'))
            // {
            //     $file = $request->file('image');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time(). '.' .$extension;
            //     $file->move('uploads/students/', $filename);
            //     $product->image = $filename;
            // }
            // dd($product->image);
                        $product->category_id = $request->category_id;
            $product->save();  
          
             // return redirect()->route('products.index')
             //                 ->with('success','Product created successfully.');
             return redirect(route('product.index'))->with('status', 'product Added Successfully');
         }

         public function edit($id) {
            //  $product = Product::find($id);
            //  return view('product.edit', ['product'=>$product]);
             $product = Product::find($id);
             return view('product.eedit', ['product'=>$product]);
         }
         public function update(Request $request, $id)                
         {
            
            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
           if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $product->image = $profileImage;
           
            }
            else{
                     unset($product->image);
                 }
            $product->category_id = $request->category_id;
           $product->save();  
              return redirect(route('product.index'))->with('status', 'product Updated Successfully');
     
         }
     
         public function delete($id) 
         {
             Product::destroy($id);
              return redirect(route('product.index'))->with('status', 'product Added Successfully');
     
         }
}
