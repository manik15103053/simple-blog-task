<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Repositories\Interface\CampaignInterface;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class CampaignController extends Controller
{
    protected $campaign;
    public function __construct(CampaignInterface $campaign)
    {
        $this->campaign = $campaign;
    }
    
    public function index(){
        $data['campaigns'] = $this->campaign->all();
        return view('admin.Campaign.index',$data);
    }
    
     public function create()
    {
        return view('admin.Campaign.create');
    }
    
    public function store(CampaignRequest $request){
        //dd($request->all());
        try{
            $this->campaign->store($request->all());
            Toastr::success('Campaign Added Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            return back()->with('error','Something went to wrong');
        }

    }

    public function edit($slug){
        $data['campaign'] = $this->campaign->get($slug);
        return view('admin.Campaign.edit',$data);
    }

    public function update(Request $request, $slug){

        $request->validate([
            'name' => 'required|string|max:65',
            'campaing_start_date' => 'required',
            'campaing_end_date' => 'required',
            'priority' => 'required',
        ]);

        //try{

            $this->campaign->update($request->all(), $slug);
            Toastr::success('campaign Updated Successfully!', 'Success');
            return redirect()->route('campaign.index');
        // }catch(Exception $e){
        //     return back()->with('error','Something went to wrong');
        // }

    }

    public function delete($slug){
        try{
            $this->campaign->delete($slug);
            Toastr::success('campaign Deleted Successfully!', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            return back()->with('error','Something went to wrong');
        }
    }

    public function statusChange(Request $request){
        try{
            $this->campaign->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }catch(Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }

    }
}
