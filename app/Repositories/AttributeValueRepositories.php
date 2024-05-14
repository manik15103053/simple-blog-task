<?php
namespace App\Repositories;
use App\Models\AttributeValue;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\AttributeValueInterface;

class AttributeValueRepositories implements AttributeValueInterface
{
   use Uploadable;
   public function all(){
        return AttributeValue::orderBy('id','desc')->get();
    }

    public function store(array $data){
        

        $attribute_value = new AttributeValue();
        $attribute_value->name = $data['name'];
        $attribute_value->attribute_id = $data['attribute_id'];
        $attribute_value->save();
    }

    public function get($id){
        return AttributeValue::find($id);
    }

    public function update(array $data,$id){

        $attribute_value =  AttributeValue::find($id);
        $attribute_value->name = $data['name'];
        $attribute_value->attribute_id = $attribute_value->attribute_id;
        $attribute_value->save();
    }

    public function delete($id){
        $attribute_value =  AttributeValue::find($id);
        if(!empty($attribute_value)){
            $attribute_value->delete();
        }
    }

}
