<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampaignController extends Controller {
    public function index() {
        $data = Campaigns::all();
        return view('back.campaigns.index', compact('data'));
    }

    public function create() {
        return view('back.campaigns.create');
    }

    public function store(CampaignRequest $request) {
        $campaign = new Campaigns;
        $campaign->title = $request->title;
        $campaign->subtitle = $request->subtitle;
        $campaign->text = $request->text;
        if($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/campaigns', $file, $fileOriginalName);
            $campaign->image = 'images/campaigns/' . $fileOriginalName;
        }
        $campaign->save();
        return redirect()->route('admin.campaigns.index');
    }

    public function edit($id) {
        $campaign = Campaigns::whereId($id)->first();
        return view('back.campaigns.edit', compact('campaign'));
    }

    public function deleteImage($id) {
        $campaign = Campaigns::whereId($id)->first();
        Storage::delete('public/' . $campaign->image);
        $campaign->image = null;
        $campaign->save();
        return redirect()->back();
    }

    public function update($id, CampaignRequest $request) {
        $campaign = Campaigns::whereId($id)->first();
        $campaign->title = $request->title;
        $campaign->subtitle = $request->subtitle;
        $campaign->text = $request->text;
        if($request->file('image')) {
            if($campaign->image) {
                Storage::delete($campaign->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/campaigns', $file, $fileOriginalName);
            $campaign->image = 'images/campaigns/' . $fileOriginalName;
        }
        $campaign->save();
        return redirect()->route('admin.campaigns.index');
    }

    public function delete($id) {
        if(Campaigns::whereId($id)->first()->image) {
            Storage::delete(Campaigns::whereId($id)->first()->image);
            Campaigns::whereId($id)->delete();
        } else {
            Campaigns::whereId($id)->delete();
        }
        return redirect()->route('admin.campaigns.index');
    }
}
