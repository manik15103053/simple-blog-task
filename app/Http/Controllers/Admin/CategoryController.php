<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interface\CategoryInterface;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $data = [];
        $data['categoriesall'] = $this->category->all();
        return view('admin.category.index',$data);
    }
    public function create()
    {
        $data = [];
        $categories = Category::where('parent_id', 0)->with('childCategories')
            ->get();

        return view('admin.category.create',compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        //dd($request->all());
        try {
            $this->category->store($request->all());
            Toastr::success('Information Added Successfully!', 'Success');
            return redirect()->route('category.index');
        }catch (Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }
    public function edit($id){
        try{
            $data=[];
            $data['category']=$this->category->get($id);
            $categories = Category::where('parent_id', 0)->with('childCategories')
            ->get();
            return view ('admin.category.edit',$data,compact('categories'));
        }catch (Exception $e){
           return back()->with('error','Sorry Something went wrong');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:65',
            'image' => 'nullable|image',
           // 'priority' => 'nullable|unique:categories',
        ]);
        try {

           // dd($request->all());
            $this->category->update($request->all(),$id);
            Toastr::success('Information Updated Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['category']=$this->category->get($id);
            return view('admin.category.show',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->category->delete($id);
            Toastr::success('Information Delete Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }

    }
    public function statusChange(Request $request)
    {
        try {
            $this->category->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch (Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }
}
