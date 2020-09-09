<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use  HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role'
    ];

    public function transform ()
    {
        return $this->toArray();
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

    /**
     * create Task
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasksCreated()
    {
        return $this->hasMany(Task::class, 'created_by', 'id');
    }

    /**
     * update Task
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasksUpdated()
    {
        return $this->hasMany(Task::class, 'updated_by', 'id');
    }

}
