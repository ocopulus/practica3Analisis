<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CredDev extends Model
{
    protected $table = 'CredDev';

    protected $fillable = [
    	'cuenta_id', 'monto', 'descripcion', 'tipo'
    ];

    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
}
