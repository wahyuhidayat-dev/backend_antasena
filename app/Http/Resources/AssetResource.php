<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'url_video' => $this->url_video,
            'video_name' => $this->video_name,
            'channel_name' => $this->channel_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
