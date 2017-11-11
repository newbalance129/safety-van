<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasInRound extends Model
{
    protected $table = 'PasInRound';
    protected $fillable = ['countPas','seat','pIdCard','roundCount'];
    protected $primaryKey = 'countPas';

    public function Passenger(){
    	return $this->belongsTo(Passenger::class,'pIdCard');
    }

    public function TravelRound(){
    	return $this->belongsTo(TravelRound::class,'roundCount');
    }


}
