<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchSize extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'is_available',
        'order',
    ];

    public function merch()
    {
        return $this->belongsTo(Merch::class);
    }
}
