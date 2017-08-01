<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';
    public $timestamps=false;

    public function users()
    {
        return $this->belongsTo('App\User','company_id');
    }
}
