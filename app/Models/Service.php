<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name_en',
        'service_name_fr',
        'service_descp_en',
        'service_descp_fr',
        'service_icon',
    ];
}
