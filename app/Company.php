<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';
    protected $timestamp=false;


    public function company()
    {
        return $this->belongsTo('App\User','company_id');
    }

}
