<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteNumber extends Model
{
    protected $table = 'RouteNumber';
    protected $fillable = ['numId','numTel','wayStart','wayEnd'];
    protected $primaryKey = 'numId';
    
}

