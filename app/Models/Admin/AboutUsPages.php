<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPages extends Model
{
    use HasFactory;
    protected $table = 'aboutus_pages';
    protected $fillable = [
        'aboutus_title',
        'about_heading',
        'aboutus_content'
    ];
}
