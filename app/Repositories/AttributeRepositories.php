<?php
namespace App\Repositories;
use App\Models\attribute;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\Interface\AttributeInterface;

class AttributeRepositories implements AttributeInterface
{
   use Uploadable;
   public function all(){
        return Attribute::orderBy('id','desc')->get();
    }

    public function store(array $data){
        

        $attribute = new Attribute();
        $attribute->name = $data['name'];
        $attribute->save();
    }

    public function get($id){
        return Attribute::find($id);
    }

    public function update(array $data,$id){

        $attribute =  Attribute::find($id);
        $attribute->name = $data['name'];
        $attribute->save();
    }

    public function delete($id){
        $attribute =  Attribute::find($id);
        if(!empty($attribute)){
            $attribute->delete();
        }
    }

}
