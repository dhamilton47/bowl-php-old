<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['school', 'owner'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['path'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get a string path for the team.
     *
     * @return string
     */
    public function path()
    {
        return "/admin/school/team/{$this->id}";
    }

    /**
     * Fetch the path to the team as a property.
     */
    public function getPathAttribute()
    {
        return $this->path();
    }

    /**
     * A team belongs to a school (user/scorer).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * A team belongs to a owner (user/scorer).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Scorer::class, 'user_id');
    }
}
