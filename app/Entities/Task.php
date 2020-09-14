<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'creator_id', 'updater_id'
    ];

    public function transform ()
    {
        return $this->toArray();
    }

    /**
     * relations with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    /**
     * relations with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updater_id', 'id');
    }
}
