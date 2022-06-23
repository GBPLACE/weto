<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function PropertyAttribute(){
        return $this->hasOne(PropertyAttribute::class, 'property_id', 'id');
    }

    public function PropertyMainPhoto(){
        return $this->hasOne(PropertyMainPhoto::class, 'property_id', 'id');
    }

    public function PropertyPhoto(){
        return $this->hasMany(PropertyPhoto::class, 'property_id', 'id');
    }

    public function Click(){
        return $this->hasMany(Click::class, 'property_id', 'id');
    }

    public function Country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function PropertyPhotoOrder(){
        return $this->hasMany(PropertyPhoto::class, 'property_id', 'id')->orderBy('p_order' , 'DESC');
    }

}
