<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeValueRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interface\AttributeValueInterface;

class AttributeValueController extends Controller
{
    protected $attribute_value;
    public function __construct(AttributeValueInterface $attribute_value)
    {
        $this->attribute_value = $attribute_value;
    }
    public function index()
    {
        $data = [];
        $data['attribute_values'] = $this->attribute_value->all();
        return view('admin.attribute.attributevalue.index',$data);
    }
    public function create()
    {

       // return view('admin.attribute_value.create');
    }
    public function store(AttributeValueRequest $request)
    {
        //dd($request->all());
        try {
            $this->attribute_value->store($request->all());
            Toastr::success('Information Added Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }
    public function edit($id){
        try{
           $data['attribute_value'] = $this->attribute_value->get($id);
           return view('admin.attribute.attributeValue.edit',$data);
        }catch (Exception $e){
           return back()->with('error','Sorry Something went wrong');
        }
    }
    public function update(Request $request, $id)
    {

        try {
            $this->attribute_value->update($request->all(),$id);
            Toastr::success('Information Updated Successfully!', 'Success');
            return redirect()->route('attribute.index');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['attribute_value']=$this->attribute_value->get($id);
            return view('admin.attribute_value.show',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->attribute_value->delete($id);
            Toastr::success('Information Delete Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }

    }
    public function statusChange(Request $request)
    {
        try {
            $this->attribute_value->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch (Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }
}
