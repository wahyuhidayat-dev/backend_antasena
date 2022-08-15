<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'url_video', 'channel_name', 'video_name'
    ];

    public function toArray()
    {
        $toArray = parent::toArray();
       // $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }


    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
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
    // public function getPicturePathAttribute()
    // {
    //     return config('app.url') . Storage::url($this->attributes['picturePath']);
    // }
}
