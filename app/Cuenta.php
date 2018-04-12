<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';

    protected $fillable = [
    	'saldo', 'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function creddev()
    {
        return $this->hasMany('App\CredDev');
    }

    public function trasferencias()
    {
        return $this->hasMany('App\Trasferencia');
    }
}
