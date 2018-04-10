<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    protected $table = 'transferencia';

    protected $fillable = [
    	'cuenta_in_id', 'cuenta_out_id', 'monto'
    ];
}
