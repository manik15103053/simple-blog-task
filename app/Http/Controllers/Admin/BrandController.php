<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Repositories\Interface\BrandInterface;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class BrandController extends Controller
{
    protected $brand;
    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    public function index(){
        $data['brands'] = $this->brand->all();
        return view('admin.brand.index',$data);
    }

    public function store(BrandRequest $request){
        try{
            $this->brand->store($request->all());
            Toastr::success('Brand Added Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }

    public function edit($slug){
        $data['brand'] = $this->brand->get($slug);
        return view('admin.brand.edit',$data);
    }

    public function update(Request $request, $slug){

        $request->validate([
            'name' => 'required|string|max:65',
            'priority' => 'required',
        ]);

        try{

            $this->brand->update($request->all(), $slug);
            Toastr::success('Brand Updated Successfully!', 'Success');
            return redirect()->route('brand.index');
        }catch(Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }

    public function delete($slug){
        try{
            $this->brand->delete($slug);
            Toastr::success('Brand Deleted Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            return back()->with('error','Something went to wrong');
        }
    }

    public function statusChange(Request $request){
        try{
            $this->brand->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch(Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }

    }
}
