<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = [
        'header_logo' ,
        'fb_link' ,
        "insta_link" ,
        'tweeter_link' ,
        'linkin_link' ,
        'footer_title' ,
        'footer_text'
    ];

    public function headerBannerContents() {

       return $this->hasMany(HeaderBannerContent::class) ;
    }
}
