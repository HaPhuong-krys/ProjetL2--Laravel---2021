<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Cours;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [  
        'login',
        'mdp',
        'type'
    ];

    /**
     * 
     *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = ['type' => NULL];

    public function getAuthPassword(){
        return $this->mdp;
    }

    public function cours(){
        return $this->belongsToMany(User::class);
    }

    // public function inscritDans() {
    //     return $this->belongsToMany(Cours::class, 'cours_users', 'user_id', 'cours_id');
    // }
}
