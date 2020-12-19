<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'name','role', 'mentorado_id', 'email', 'password',
    ];



    public function isAdministrador(){
        if ($this->role == 1){
            return true;
        }
        return false;

    }
    public function isCandidato(){
        if ($this->role == 0){
            return true;
        }
        return false;
    }
    public function isCoordenador(){
        if ($this->role == 2 ){
            return true;
        }
        return false;
    }
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

    public function mentorado()
    {
        return $this->belongsTo(Mentorado::class);
    }




}
