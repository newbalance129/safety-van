<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'Report';
    protected $fillable = ['reportId','reportProblem','roundCount','vanLicense','created_at'];
    protected $primaryKey = 'reportId';
}
