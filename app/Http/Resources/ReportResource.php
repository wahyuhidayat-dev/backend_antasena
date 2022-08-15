<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'asset_id' => $this->asset_id,
            'periode' => $this->periode,
            'revenue_usd' => $this->revenue_usd,
            'rate_idr' => $this->rate_idr,
            'revenue_idr' => $this->revenue_idr,
            'label_revenue' => $this->label_revenue,
            'get_ugc' => $this->get_ugc,
            'marketing' => $this->marketing,
            'share_revenue' => $this->share_revenue,
            'tax' => $this->tax,
            'final_revenue' => $this->final_revenue,
            'share' => $this->share,
            'ads' => $this->ads,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
