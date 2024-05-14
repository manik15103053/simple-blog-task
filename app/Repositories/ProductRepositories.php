<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interface\ProductInterface;
use App\Traits\Uploadable;
use Illuminate\Support\Str;

class ProductRepositories implements ProductInterface{
    use Uploadable;

    public function all(){
        return Product::orderBy('id','desc')->get();
    }

    public function store(array $data){

    }

    public function get($slug){

    }

    public function update(array $data,$slug){

    }

    public function delete($slug){

    }

    public function statusChange(array $data){

    }
}
