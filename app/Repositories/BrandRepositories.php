<?php
namespace App\Repositories;

use App\Models\Brand;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\BrandInterface;

class BrandRepositories implements BrandInterface{
    use Uploadable;
    public function all(){
        return Brand::orderBy('id','desc')->get();
    }

    public function store(array $data){

        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.brand'));
        }
        $brand = new Brand();
        $brand->name = $data['name'];
        $brand->slug = Str::slug($data['name']);
        $brand->status = $data['status'];
        $brand->image  = $filename;
        $brand->priority  = $data['priority'];
        $brand->save();
    }

    public function get($slug){
        return Brand::where('slug',$slug)->first();
    }

    public function update(array $data,$slug){

        $brand = Brand::where('slug',$slug)->first();

        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.brand'));
            $this->deleteOne(config('imagepath.brand'), $brand->image);
        }else{
            $filename=$brand->image;
        }

        $brand->name = $data['name'];
        $brand->slug = Str::slug($data['name']);
        $brand->status = $data['status'];
        $brand->image  = $filename;
        $brand->priority  = $data['priority'];
        $brand->save();
    }

    public function delete($slug){

        $brand = Brand::where('slug',$slug)->first();
        if(!empty($brand)){
            $brand->delete();
        }
    }

    public function statusChange(array $data){

        $brand = Brand::find($data['id']);
        if ($brand) {
            $brand->status = $brand->status ? 0 : 1;
            $brand->save();
        }
    }
}
