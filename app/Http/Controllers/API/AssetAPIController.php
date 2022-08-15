<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Http\Resources\AssetResource;
use Illuminate\Validation\Validator;

class AssetAPIController extends Controller
{
    public function index()
    {
        $data = Asset::latest()->get();
        return response()->json(AssetResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|integer',
            'url_video' => 'required',
            'video_name' => 'required',
            'channel_name' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $program = Asset::create([
            'user_id' => $request->user_id,
            'url_video' => $request->url_video,
            'video_name' => $request->video_name,
            'channel_name' => $request->channel_name
         ]);
        
        return response()->json(['Asset created successfully.', new AssetResource($program)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::find($id);
        if (is_null($asset)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new AssetResource($asset)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|integer',
            'url_video' => 'required',
            'video_name' => 'required',
            'channel_name' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $asset->user_id = $request->user_id;
        $asset->url_video = $request->url_video;
        $asset->channel_name = $request->channel_name;
        $asset->save();
        
        return response()->json(['Asset updated successfully.', new AssetResource($asset)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return response()->json('Asset deleted successfully');
    }
}
