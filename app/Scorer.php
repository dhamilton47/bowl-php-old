<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Scorer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scorer_name',
        'scorer_username',
        'scorer_email',
        'scorer_password',
        'scorer_confirmation_token',
        'scorer_avatar_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'scorer_password',
        'scorer_remember_token',
        'scorer_email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'scorer_confirmed' => 'boolean'
    ];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'scorer_username';
    }

    /**
     * Fetch the school that is administered by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne(School::class)->latest();
    }

    /**
     * Fetch the team(s) that is(are) administered by the scorer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team()
    {
        return $this->hasMany(Team::class)->latest();
    }

    /**
     * Mark the scorer's account as confirmed.
     */
    public function confirm()
    {
        $this->scorer_confirmed = true;
        $this->scorer_confirmation_token = null;

        $this->save();
    }

    /**
     * Get the path to the scorer's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    public function getScorerAvatarPathAttribute($scorer_avatar)
    {
        return asset($scorer_avatar ? ('storage/' . $scorer_avatar): 'images/avatars/default.png');
    }
}
