<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name', 'Descripcion', 'cantidad',
    ];
}
