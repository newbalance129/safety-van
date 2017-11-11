<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{

    protected $table = 'Passenger';
    protected $fillable = ['pIdCard','pFName','pLName'];
    protected $primaryKey = 'pIdCard';

    public function PasInRound(){
    	return $this->hasMany(PasInRound::class);
    }

    public function TravelRound(){
      return $this->belongsToMany(TravelRound::class,'PasInRound','pIdCard','roundCount');
    }

}
