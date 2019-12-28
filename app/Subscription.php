<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
     ];
    /* All the fields present on this array will be automatically accessible in your views with Carbon functions
    *
    * @var array
    */
   protected $dates = ['created_at', 'updated_at', 'start', 'end'];
    /**
     * Model relationships
    */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
