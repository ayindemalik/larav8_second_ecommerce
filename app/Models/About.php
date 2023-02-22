<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
            
    protected $fillable = [
        'about_title_en',
        'about_title_fr',
        'about_shortdescp_en',
        'about_shortdescp_fr',
        'about_longdescp_en',
        'about_longdescp_fr',
        'main_image',
    ];
}
