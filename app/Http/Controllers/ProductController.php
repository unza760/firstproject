<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $category = Task::all();
         return view('category.index', ['category'=>$category]);
   
     
    }
  public function insert(Request $request)
  {
    // {
    //         $category = new Task;
    //         $category->name = $request->name;
    //         $category->description = $request->description;
    //         if ($image = $request->file('image')) {
    //             $destinationPath = 'image/';
    //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $profileImage);
    //             $input['image'] = "$profileImage";
    //             $category->image
    //         }
    //        $category->save();  
        //    return view('Task.index', ['Task'=>$Task]);
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('category.index')
                        ->with('success','Product created successfully.');
        return redirect(route('product.index'))->with('status', 'Task Added !!');
    }
  
public function edit($id)
{
      $category = Task::find($id);
    return view('product.edit', ['category'=>$category]);
}
public function update(Request $request, $id)
    {
        $category = Task::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
       $category->save();  
    
    return redirect(route('product.index'))->with('status', 'Task Updated !!');

        }
    public function delete($id)
    {
    Task::destroy($id);
    return redirect(route('categ.index'))->with('status', 'Task Deleted !!');
    }
   
}
