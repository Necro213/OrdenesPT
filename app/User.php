<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    public function  hasAnyRole($role){
        if(is_array($role)){
            foreach ($role as $roles){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($role)){
                return true;
            }
        }
        return false;
    }

    public function authorizeRoles($role){
        if($this->hasRole($role)){
            return true;
        }
        abort(401,'Error, no autorizado');
    }
}
