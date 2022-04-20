<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\CategoryController;


class CategoryController extends Controller
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
    
    //To create category
    public function create(){
        return view('backend.category.create');
    }

    //To store category
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required',
        ]);
        $category_name = Str::lower($request->category_name);
        if(Category::Where('category_name','=',$category_name)->doesntExist()){
            Category::insert([
                'category_name' => $category_name,
                'created_at' => Carbon::now(),
            ]);
        }else{
            return back()->with('inserr','Category already inserted');
        }
        return back()->with('insdone','Category inserted!');
    }

    public function index(){
        $all_categories = Category::all();
        $all_trashed = Category::onlyTrashed()->get();
        return view('backend.category.index', compact('all_categories','all_trashed'));
    }

    public function edit($id){
        //to edit category
        $single_info = Category::find($id);
        return view('backend.category.edit', compact('single_info'));
    }

    //To update category data
    public function update(Request $request){
        $request->validate([
            'category_name' => 'required',
        ]);
        $category_name = Str::lower($request->category_name);
        Category::findOrFail($request->category_id)->update([
            'category_name' => $category_name,
        ]);
        return redirect('/category/index');
    }

    public function softdelete($id){
        Category::find($id)->delete();
        return back();
    }
    
    public function restore($id){
        Category::withTrashed()->where('id',$id)->restore();
        return back();
    }

    public function forceDelete($id){
        Category::withTrashed()->where('id',$id)->forceDelete();
        return back();
    }

        
        
}
