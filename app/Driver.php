<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'Driver';
    protected $fillable = ['dIdCard','dFName','dLName','dPicture','dGender','dBlood','dDob','created_at','status'];
    protected $primaryKey = 'dIdCard';

    public function TravelRound(){
    	return $this->hasMany(TravelRound::class);
    }

}
