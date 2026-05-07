<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderSetting extends Model
{
    protected $fillable=[
        'slider_id',
        'autoplay',
        'interval',
        'show_arrows',
        'show_indicators'
    ];
    public function slider(){
        return $this->belongsTo(Slider::class);
    }
}
