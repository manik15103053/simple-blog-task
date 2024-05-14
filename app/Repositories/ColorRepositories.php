<?php
namespace App\Repositories;
use App\Models\Color;
use App\Repositories\Interface\ColorInterface;
class ColorRepositories implements ColorInterface {

    public function all(){
        return Color::orderBy('id','desc')->get();
    }

    public function store(array $data){

        $color = new Color();
        $color->name = $data['name'];
        $color->code = $data['code'];
        $color->save();
    }

    public function get($id){
        return Color::find($id);
    }
    public function update(array $data,$id){

        $color = Color::find($id);
        $color->name = $data['name'];
        $color->code = $data['code'];
        $color->save();
    }

    public function delete($id){

        $color = Color::find($id);
        if(!empty($color)){
            $color->delete();
        }
    }
}
