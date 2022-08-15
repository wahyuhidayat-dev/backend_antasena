<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'asset_id','periode','revenue_usd','rate_idr','revenue_idr','label_revenue','get_ugc',
        'marketing','share_revenue','tax','final_revenue','share','ads'
    ];

    public function toArray()
    {
        $toArray = parent::toArray();
       // $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }


    public function asset()
    {
        return $this->hasOne(Asset::class,'id','asset_id');
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)
            ->getPreciseTimestamp(3);
    }
    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::parse($updated_at)
            ->getPreciseTimestamp(3);
    }
}
