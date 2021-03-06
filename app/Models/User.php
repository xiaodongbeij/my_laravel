<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/{$hash}?s={$size}";
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::creating(function ($user) {
            $user->activation_token = Str::random(10);
        });
    }

    public function statuses()
    {
        return $this->hasMany(Statuse::class);
    }

    public function feed()
    {
        return $this->statuses()
            ->orderBy('created_at', 'desc');
    }
}
