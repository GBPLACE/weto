<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function Property(){
        return $this->hasMany(Property::class, 'partner_id', 'id')->where(['draft'=> 0, 'verify'=> 1, 'reject'=> 0]);
    }
}
