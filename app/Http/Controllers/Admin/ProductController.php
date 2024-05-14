<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
          $this->product = $product;
    }

    public function index(){
        $data['products'] = $this->product->all();
        return view('admin.product.index');
    }

    public function create(){

        return view('admin.product.create');
    }
}
