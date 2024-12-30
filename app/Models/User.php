<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public $timestamps = false;
    public function Discussions()
    {
        return $this->hasMany(Discussions::class);
    }
    public function Reports()
    {
        return $this->hasMany(Reports::class);
    }

    public function Comments()
    {
     return $this->hasMany(Comments::class);
    }
    public function Likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function Roles()
    {
        return $this->belongsToMany(Roles::class,'user_role_assigment');
    }
    public function Notifications()
    {
        return $this->hasMany(Notifications::class);
    }
    public function UserActivityLogs()
    {
        return $this->hasMany(UserActivityLogs::class);
    }
    public function Forums()
    {
        return $this->belongsToMany(Forums::class,'user_forums');
    }
    public function Uploads()
    {
        return $this->hasMany(Uploads::class);
    }
    public function EmailVerifications()
    {
        return $this->belongsTo(EmailVerifications::class);
    }

}
