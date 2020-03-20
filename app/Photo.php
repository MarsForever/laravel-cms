<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public function immageable(){
        return $this->morphTo() ;
    }
}
