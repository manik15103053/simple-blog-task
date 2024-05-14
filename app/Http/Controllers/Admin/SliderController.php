<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interface\SliderInterface;
class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderInterface $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $data = [];
        $data['sliders'] = $this->slider->all();
        return view('admin.slider.index',$data);
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderRequest $request)
    {
        //dd($request->all());
        try {
            $this->slider->store($request->all());
            Toastr::success('Information Added Successfully!', 'Success');
            return redirect()->route('slider.index');
        }catch (Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }
    public function edit($id){
        try{
            $data=[];
            $data['slider']=$this->slider->get($id);
            return view ('admin.slider.create',$data);
        }catch (Exception $e){
           return back()->with('error','Sorry Something went wrong');
        }
    }
    public function update(Request $request, $id)
    {
        
        try {
            $this->slider->update($request->all(),$id);
            Toastr::success('Information Updated Successfully!', 'Success');
            return redirect()->route('slider.index');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['slider']=$this->slider->get($id);
            return view('admin.slider.show',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->slider->delete($id);
            Toastr::success('Information Delete Successfully!', 'Success');
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }

    }
    public function statusChange(Request $request)
    {
        try {
            $this->slider->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch (Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }
}
