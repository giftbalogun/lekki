<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use \Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address'
    ];
    /* All the fields present on this array will be automatically accessible in your views with Carbon functions
    *
    * @var array
    */
   protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Mutators
     *
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    /**
     * Model rlationships
     */
    public function subscriptionsAsTutor()
    {
        return $this->hasMany(Subscription::class, 'tutor_id');
    }

    public function subscriptionsAsClient()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    public function requestsAsTutor()
    {
        return $this->hasMany(TutorRequest::class, 'tutor_id');
    }

    public function requestAsClient()
    {
        return $this->hasMany(TutorRequest::class, 'client_id');
    }
    /**
     * User functions
     */
    public function getImage()
    {
        return $this->profile_image ?? 'master/images/stock/avatar.png';
    }

    public function completedTutorailsAsTutor()
    {
        return $this->subscriptionsAsTutor()->where('end', '>', Carbon::now())->get()->count();
    }

    /**
     * Admin functions
     */
    public function totalUsers()
    {
        return self::all()->count();
    }
}
