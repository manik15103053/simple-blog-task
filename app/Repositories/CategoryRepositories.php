<?php
namespace App\Repositories;
use App\Models\Category;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\Interface\CategoryInterface;

class CategoryRepositories implements CategoryInterface
{
   use Uploadable;
   public function all(){
        return Category::orderBy('id','desc')->get();
    }

    public function store(array $data){
        $filename = "";
        $status = 1;
        $type = 1;

        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }

        if (isset($data['slug']) && $data['slug'] !== null) {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['slug']));
        } else {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['name'])) . '-' . Str::random(5);
        }

        if (isset($data['parent_id']) && $data['parent_id'] !== "0") {
            $parent_id = $data['parent_id'];
            $parent = Category::find($parent_id);
            if ($parent) {
                $type = $parent->type + 1;
            }
        }
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.category'));
        }
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $slug;
        $category->type = $type;
        $category->status = $data['status'];
        $category->image  = $filename;
        $category->priority  = $data['priority'];
        $category->parent_id  = $data['parent_id'];
        $category->save();
    }

    public function get($id){
        return Category::find($id);
    }

    public function update(array $data,$id){

        $category =  Category::find($id);

        $filename = "";
        $status = 1;
        $type = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        if (isset($data['slug']) && $data['slug'] !== null) {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['slug']));
        } else {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['name'])) . '-' . Str::random(5);
        }

        if (isset($data['parent_id']) && $data['parent_id'] !== "0") {
            $parent_id = $data['parent_id'];
            $parent = Category::find($parent_id);
            if ($parent) {
                $type = $parent->type + 1;
            }
        }
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.category'));
            $this->deleteOne(config('imagepath.category'), $category->image);
        }else{
            $filename=$category->image;
        }
        $category->name = $data['name'];
        $category->slug = $slug;
        $category->type = $type;
        $category->status = $status;
        $category->image  = $filename;
        $category->priority  = $data['priority'];
        $category->parent_id  = $data['parent_id'];
        $category->save();
    }

    public function delete($id){
        $category =  Category::find($id);
        if(!empty($category)){
            $this->deleteOne(config('imagepath.category'), $category->image);
            $category->delete();
        }
    }

    public function statusChange(array $data)
    {
        $category = Category::find($data['id']);
        if ($category) {
            $category->status = $category->status ? 0 : 1;
            $category->save();
        }
    }
}
