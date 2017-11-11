<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class way extends Model
{
    protected $table = 'RouteNumber';
    protected $fillable = ['numId','numTel','numDetail','wayStart','wayEnd','Code'];
    protected $primaryKey = 'numId';
}
