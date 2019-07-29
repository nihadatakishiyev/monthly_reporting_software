<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['person_no', 'name', 'surname', 'training_name','start_date', 'end_date', 'type_loc', 'type_emp'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
