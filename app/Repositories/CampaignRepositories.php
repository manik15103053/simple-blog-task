<?php
namespace App\Repositories;

use App\Models\Campaign;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\CampaignInterface;

class CampaignRepositories implements CampaignInterface{
    use Uploadable;
    public function all(){
        return Campaign::orderBy('id','desc')->get();
    }

    public function store(array $data){
        $filename='';
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.campaign'));
        }
        $campaign = new Campaign();
        $campaign->name = $data['name'];
        $campaign->slug = Str::slug($data['name']);
        $campaign->campaing_start_date = $data['campaing_start_date'];
        $campaign->campaing_end_date = $data['campaing_end_date'];
        $campaign->priority = $data['priority'];
        $campaign->is_featured = $data['is_featured'];
        $campaign->status = $data['status'];
        $campaign->image  = $filename;
        $campaign->save();
    }

    public function get($slug){
        return Campaign::where('slug',$slug)->first();
    }

    public function update(array $data,$slug){

        $campaign = Campaign::where('slug',$slug)->first();
        $filename ='';
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, config('imagepath.campaign'));
            $this->deleteOne(config('imagepath.campaign'), $campaign->image);
        }else{
            $filename=$campaign->image;
        }
        $campaign->name = $data['name'];
        $campaign->slug = Str::slug($data['name']);
        $campaign->campaing_start_date = $data['campaing_start_date'];
        $campaign->campaing_end_date = $data['campaing_end_date'];
        $campaign->is_featured = $data['is_featured'];
        $campaign->status = $data['status'];
        $campaign->image  = $filename;
        $campaign->priority  = $data['priority'];
        $campaign->save();
    }

    public function delete($slug){

        $campaign = Campaign::where('slug',$slug)->first();
        if(!empty($campaign)){
            $campaign->delete();
        }
    }

    public function statusChange(array $data){

        $campaign = Campaign::find($data['id']);
        if ($campaign) {
            $campaign->status = $campaign->status ? 0 : 1;
            $campaign->save();
        }
    }
}
