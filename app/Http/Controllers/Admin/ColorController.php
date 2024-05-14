<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Repositories\Interface\ColorInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $color;
    public function __construct(ColorInterface $color)
    {
        $this->color = $color;
    }

    public function index(){
        $data['colors'] = $this->color->all();
        return view('admin.color.index',$data);
    }

    public function store(ColorRequest $request){
        try{
            $this->color->store($request->all());
            Toastr::success('Color Added Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            Toastr::error('Sorry Something went to wrong!', 'Error');
            return back();
        }

    }

    public function edit($id){
        $data['color'] = $this->color->get($id);
        return view('admin.color.edit',$data);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:65',
            'code' => 'required',
        ]);

        try{

            $this->color->update($request->all(), $id);
            Toastr::success('Color Updated Successfully!', 'Success');
            return redirect()->route('color.index');
        }catch(Exception $e){
            Toastr::error('Sorry Something went to wrong!', 'Error');
            return back();
        }

    }

    public function delete($id){
        try{
            $this->color->delete($id);
            Toastr::success('Color Deleted Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            Toastr::error('Sorry Something went to wrong!', 'Error');
        }
    }

}
