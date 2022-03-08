<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        $category = Task::all();
         return view('category.index', ['category'=>$category]);
   
     
    }
  public function insert(Request $request)
    {
            $category = new Task;
            $category->name = $request->name;
            $category->description = $request->description;
           $category->save();  
        //    return view('Task.index', ['Task'=>$Task]);
        return redirect(route('category.index'))->with('status', 'Task Added !!');
    }
  
public function edit($id)
{
      $category = Task::find($id);
    return view('category.edit', ['category'=>$category]);
}
public function update(Request $request, $id)
    {
        $category = Task::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
       $category->save();  
    
    return redirect(route('category.index'))->with('status', 'Task Updated !!');

        }
    public function delete($id)
    {
    Task::destroy($id);
    return redirect(route('category.index'))->with('status', 'Task Deleted !!');
    }
}
