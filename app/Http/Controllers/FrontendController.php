<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index(){
        $data['categories'] = Category::orderBy('priority','asc')->get();
        $data['blogs'] = Blog::where('publication_date', '<=',Carbon::now()->format('Y-m-d'))->get();
        return view('index',$data);
    }

    public function blog($slug = null){

        $blogs = Blog::where('publication_date', '<=', Carbon::now()->format('Y-m-d'));

        if (!is_null($slug)) {
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $blogs = $blogs->where('category_id', $category->id);
            }
        }

        $data['blogs'] = $blogs->orderBy('id','desc')->get();
        return view('blog', $data);
    }

}
