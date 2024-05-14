<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Requests\AttributeRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interface\AttributeInterface;


class AttributeController extends Controller
{
    protected $attribute;
    public function __construct(AttributeInterface $attribute)
    {
        $this->attribute = $attribute;
    }
    public function index()
    {
        $data = [];
        $data['attributes'] = $this->attribute->all();
        return view('admin.attribute.index',$data);
    }
    public function create()
    {
        //return view('admin.attribute.create');
    }
    public function store(AttributeRequest $request)
    {
        //dd($request->all());
        try {
            $this->attribute->store($request->all());
            Toastr::success('Information Added Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }
    public function edit($id){
        try{
            $data['attribute'] = $this->attribute->get($id);
            return view('admin.attribute.edit',$data);
        }catch (Exception $e){
           return back()->with('error','Sorry Something went wrong');
        }
    }
    public function update(AttributeRequest $request, $id)
    {
        try {
            $this->attribute->update($request->all(),$id);
            Toastr::success('Information Updated Successfully!', 'Success');
            return redirect()->route('attribute.index');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['attribute']=$this->attribute->get($id);
            $data['attribute_values'] = AttributeValue::where('attribute_id', $id)->get();

            return view('admin.attribute.attributevalue.index',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->attribute->delete($id);
            Toastr::success('Information Delete Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }

    }
    public function statusChange(Request $request)
    {
        try {
            $this->attribute->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch (Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }
}
