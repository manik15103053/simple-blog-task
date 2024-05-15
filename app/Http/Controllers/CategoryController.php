<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_role == 1){
            $data['categories'] = Category::orderBy('priority','asc')->paginate(6);
        }elseif(Auth::user()->user_role == 2){
            $data['categories'] = Category::where('created_by',Auth::user()->id)->orderBy('priority','asc')->paginate(6);
        }

        return view('pages.category.index',$data);
    }

    public function create()
    {
        return view('pages.category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'   =>  'required|max:100',
            'priority'  =>   'required'
        ]);
        try {
            $category = new Category();
            $category->name  = $request->name;
            $category->slug  = Str::slug($request->name);
            $category->priority  = $request->priority;
            $category->created_by = auth()->id();
            $category->save();
            return redirect()->route('category.index')->with('success','Category Created Successfully');
        }catch (Exception $e){
            return redirect()->route('category.create')->with('error','Sorry Something went to wrong');
        }

    }

    public function edit($slug)
    {
        $data['category'] = Category::where('slug',$slug)->first();
        return view('pages.category.edit',$data);
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request,[

            'name'   =>  'required|max:100',
            'priority'  =>   'required'
        ]);
        try {
            $category =  Category::where('slug',$slug)->first();
            $category->name  = $request->name;
            $category->slug  = Str::slug($request->name);
            $category->priority  = $request->priority;
            $category->updated_by = auth()->id();
            $category->save();
            return redirect()->route('category.index')->with('success','Category Updated Successfully');
        }catch (Exception $e){
            return redirect()->route('category.edit')->with('error','Sorry Something went to wrong');
        }

    }

    public function delete($slug)
    {
        try {
            $category = Category::where('slug',$slug)->first();
            if(!empty($category)){
                $category->delete();
                return redirect()->back()->with('success','Category Deleted Successfully');
            }
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry Something went to wrong');
        }
    }
}
