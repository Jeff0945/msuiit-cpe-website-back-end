<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchColor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'image_src',
        'image_alt',
        'color',
        'selected_color',
        'order',
    ];

    public function merch()
    {
        return $this->belongsTo(Merch::class);
    }
}
