<?php
namespace App\Repositories;
use App\Models\Slider;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\SliderInterface;

class SliderRepositories implements SliderInterface
{
   use Uploadable;
   public function all(){
        return Slider::orderBy('id','desc')->get();
    }

    public function store(array $data){
        $filename = "";
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.slider'));
        }
        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->status = $data['status'];
        $slider->image  = $filename;
        $slider->priority  = $data['priority'];
        $slider->link = $data['link'];
        $slider->short_description = $data['short_description'];
        $slider->save();
    }

    public function get($id){
        return Slider::find($id);
    }

    public function update(array $data,$id){

        $slider =  Slider::find($id);
        $filename = "";
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.slider'));
            $this->deleteOne(config('imagepath.slider'), $slider->image);
        }else{
            $filename=$slider->image;
        }
        $slider->title = $data['title'];
        $slider->status = $data['status'];
        $slider->image  = $filename;
        $slider->priority  = $data['priority'];
        $slider->link  = $data['link'];
        $slider->short_description  = $data['short_description'];
        $slider->save();
    }

    public function delete($id){
        $slider =  Slider::find($id);
        if(!empty($slider)){
            $this->deleteOne(config('imagepath.slider'), $slider->image);
            $slider->delete();
        }
    }

    public function statusChange(array $data)
    {
        $slider = Slider::find($data['id']);
        if ($slider) {
            $slider->status = $slider->status ? 0 : 1;
            $slider->save();
        }
    }
}
