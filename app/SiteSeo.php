<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSeo extends Model
{
    protected $fillable = ['site_page_number','page_title' , 'keywords' , 'description'] ;
}
