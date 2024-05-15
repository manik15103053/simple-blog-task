<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_role == 1){
            $data['blogs'] = Blog::orderBy('id','desc')->paginate(5);
        }elseif(Auth::user()->user_role == 2){
            $data['blogs'] = Blog::where('created_by',Auth::user()->id)->orderBy('id','desc')->paginate(5);
        }
        return view('pages.blog.index',$data);
    }

    public function create()
    {
        $data['categories'] = Category::orderBy('priority','asc')->get();
        return view('pages.blog.create',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'             =>  'required|max:100',
            'category_id'       =>   'required|integer',
            'text_content'           =>   'required|string',
            'publication_date'  =>   'required|date',
        ],
            [
                'category_id.required' => 'Category field is required'
            ]
        );
        try {
            $blog = new Blog();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('images/blog/', $fileName);
                $blog->image = 'images/blog/' . $fileName; // Set the image path
            }

            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category_id;
            $blog->text_content = $request->text_content;
            $blog->publication_date = $request->publication_date;
            $blog->created_by = auth()->id();

            $blog->save();
            return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
        }catch (Exception $e){
            return redirect()->route('blog.create')->with('error','Sorry Something went to wrong');
        }

    }

    public function edit($slug)
    {
        $data['blog'] = Blog::where('slug',$slug)->first();
        $data['categories'] = Category::orderBy('priority','asc')->get();
        return view('pages.blog.edit',$data);
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request,[

            'title'             =>  'required|max:100',
            'category_id'       =>   'required|integer',
            'text_content'      =>   'required|string',
            'publication_date'  =>   'required|date',
        ],
            [
                'category_id.required' => 'Category field is required'
            ]
        );
        try {
            $blog = Blog::where('slug',$slug)->first();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('images/blog/', $fileName);
                $blog->image = 'images/blog/' . $fileName; // Set the image path
            }

            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category_id;
            $blog->text_content = $request->text_content;
            $blog->publication_date = Carbon::parse($request->publication_date);
            $blog->updated_by = auth()->id();
            $blog->save();
            return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
        }catch (Exception $e){
            return redirect()->route('blog.edit')->with('error','Sorry Something went to wrong');
        }
    }

    public function delete($slug)
    {
        try {
            $blog = Blog::where('slug',$slug)->first();
            if(!empty($blog)){
                $blog->delete();
                return redirect()->back()->with('success','Blog Deleted Successfully');
            }
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry Something went to wrong');
        }
    }
}
