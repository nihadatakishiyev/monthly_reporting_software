<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrData extends Model
{
    protected $fillable = ['male_num', 'female_num', 'azin_staff_num', 'outsource_azin', 'outsource_ministry', 'outsource_sebeke' ,
        'school_num', 'texn_num', 'bachelor_num', 'master_num', 'phd_num', 'opening_balance', 'closing_balance', 'hr_turnover',
        'average_age', 'intranet_entrance', 'date'];
}
