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
        'name', 'created_by_id', 'updated_by_id'
    ];

    public function transform ()
    {
        return $this->toArray();
    }

    /**
     * relations with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    /**
     * relations with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }
}
