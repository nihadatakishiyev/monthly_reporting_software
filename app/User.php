<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static paginate(int $int)
 * @method static find(int $id)
 * @method static findOrFail(int $id)
 * @method static where(string $string, $Person_No)
 * @method static truncate()
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_no','name', 'surname', 'email', 'password','birth_date', 'gender', 'education', 'position','education',
        'status', 'org_unit','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trainings(){
        return $this->hasMany('App\Training');
    }

    public function absences(){
        return $this->hasMany('App\AbsenceEntries');
    }

    public function absences2018(){
        return $this->hasMany('App\Absence_Entry_2018');
    }
}
