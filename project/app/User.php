<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Order;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'qmimorja'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','admin','status'
    ];

    public static function getUserName($id)
    {
         $users = User::find($id);
            if($users !== null)
                return "Eshte gjetur";
            else 
                return "Nuk eshte gjetur";
    }   

    public function order()
    {
        return $this->hasMany('App\Order','UserID');
    }
    
    public function cart()
    {
        return $this->hasMany('App\Cart','UserID');
    }

}
