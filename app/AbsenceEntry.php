<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 */
class AbsenceEntry extends Model
{
    protected $fillable = ['person_no', 'start_date', 'end_date', 'type'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
