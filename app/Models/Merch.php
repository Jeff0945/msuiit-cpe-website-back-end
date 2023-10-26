<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merch extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'order',
    ];

    public function merch_sizes()
    {
        return $this->hasMany(MerchSize::class)->orderBy('order');
    }

    public function merch_colors()
    {
        return $this->hasMany(MerchColor::class)->orderBy('order');
    }

    public function getImageSrcAttribute()
    {
        return $this->merch_colors()->first()->image_src;
    }

    public function getImageAltAttribute()
    {
        return $this->merch_colors()->first()->image_alt;
    }
}
