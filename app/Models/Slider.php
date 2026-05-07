<?php

namespace App\Models;

use App\Models\SliderSetting;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=['title','image'];
    public function images()
    {
        return $this->hasMany(SliderImage::class);
    }



    public function creator(){
        return $this->belongsTo(User::class,'slider_creator');
    }


    public function settings(){
        return $this ->hasOne(SliderSetting::class);
    }
}
