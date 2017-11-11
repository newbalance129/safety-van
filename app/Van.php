<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    protected $table = 'Van';
    protected $fillable = ['vId','vLicense','numId'];
    protected $primaryKey = 'vId';

    public function TravelRound(){
    	return $this->hasMany(TravelRound::class);
    }

    

}
