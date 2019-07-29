<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalAgreement extends Model
{
    protected $fillable = ['agr_name', 'status', 'count'];
}
