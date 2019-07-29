<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalCourt extends Model
{
    protected $fillable = ['company_name', 'debt_status', 'amount', 'amount_in_month', 'report_date'];
}
