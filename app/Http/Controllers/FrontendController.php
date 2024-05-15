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
        $blogs = Blog::orderBy('id','desc');

        $data['blogs'] = $blogs->get();
        return view('index',$data);
    }

    public function postByCat($slug = null)
    {
        $data['categories'] = Category::orderBy('priority','asc')->get();
        $blogs = Blog::orderBy('id','desc');
        if (!is_null($slug)) {
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $blogs = $blogs->whereJsonContains('category_id', (string)$category->id);
            }
        }
        $data['blogs'] = $blogs->get();
        return view('index',$data);
    }

    public function blog($slug = null){

        $blogs = Blog::orderBy('id','desc');

//        if (!is_null($slug)) {
//            $category = Category::where('slug', $slug)->first();
//
//            if ($category) {
//                $blogs = $blogs->whereJsonContains('category_id', (string)$category->id);
//            }
//        }

        $data['blogs'] = $blogs->get();
        return view('blog', $data);
    }

}
