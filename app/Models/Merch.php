<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function merchSize(): HasMany
    {
        return $this->hasMany(MerchSize::class)->orderBy('order');
    }

    public function merchColor(): HasMany
    {
        return $this->hasMany(MerchColor::class)->orderBy('order');
    }

    public function getImageSrcAttribute()
    {
        return $this->merchColor()->first()?->image_src ?? '';
    }

    public function getImageAltAttribute()
    {
        return $this->merchColor()->first()?->image_alt ?? '';
    }
}
