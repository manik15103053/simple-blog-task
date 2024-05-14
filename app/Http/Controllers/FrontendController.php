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
}
