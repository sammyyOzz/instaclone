<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
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

    //this boot method is called whenever we are booting up this model, 
    //the block of code with it is responsible for fixing the error of "trying to get property of non-object 'title'"
    protected static function boot()
    {
        parent::boot();

        //created is an 'event' and gets fired up when a new user is created
        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->username,  //making the default title to be the user's username
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
