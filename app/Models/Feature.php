<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_name_en',
        'feature_name_fr',
        'feature_descp_en',
        'feature_descp_fr',
        'feature_icon',
    ];
}
