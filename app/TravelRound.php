<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRound extends Model
{
    protected $table = 'TravelRound';
    protected $fillable = ['roundCount','rId','rDay','rType','rTime','dIdCard','vId'];
    protected $primaryKey = 'roundCount';

    public function PasInRound(){
    	return $this->belongsTo(PasInRound::class, 'countPas');
    }

    public function Van(){
    	return $this->belongsTo(Van::class, 'vId');
    }

    public function Passenger(){
      return $this->belongsToMany(Passenger::class,'PasInRound','roundCount','pIdCard');
    }

    public function Driver(){
    	return $this->belongsTo(Driver::class, 'dIdCard');
    }


}
