<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'Location';
    protected $fillable = ['ICount','latitude','longitude','Itime','roundCount'];
    protected $primaryKey = 'ICount';
}
