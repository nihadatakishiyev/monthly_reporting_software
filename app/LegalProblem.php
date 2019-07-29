<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalProblem extends Model
{
    protected $fillable = ['problem', 'status', 'solution', 'execution_time'];
}
