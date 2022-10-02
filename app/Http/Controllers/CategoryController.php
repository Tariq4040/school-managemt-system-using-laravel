<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
//        $result = Category::all();
//        dd($result());
        $categories = Category::with('users')->latest()->paginate(5);
//        $categories = DB::table('users')
//            ->join('categories' , 'categories.user_id' , 'users.id')
//            ->select('categories.*' , 'users.name')
//            ->latest()
//            ->paginate(5);
        return view('admin.category.index' , compact('categories'));
    }

    public function addCategory(Request $request){
        $validated = $request->validate([
           'category_name' => 'required|unique:categories|max:255',
        ],
            [
                'category_name.required' => 'Provide Category Name',
                'category_name.max' => 'Category Name must be contains 255 character',
            ]
        );
        if ($validated){
            Category::create([
                'category_name'=> $request->category_name,
                'user_id' => Auth::user()->id,
            ]);
            return Redirect()->back()->with(['success' => 'User Category is Added Successfully']);
        }
        else{
            return redirect()->back();
        }
    }


    public function edit($id){
        $editCategory = Category::find($id);
        return view('admin.category.edit' , compact('editCategory'));
    }

    public function update(Request $request , $id){
        $updateCategory = Category::find($id)->update([
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('all_category')->with(['success' => 'Category is Update Successfully']);
    }


    public function delete($id){
        $result = Category::find($id)->delete();
        return Redirect()->back()->with(['success' => 'Category Deleted Successfully']);
    }
}
