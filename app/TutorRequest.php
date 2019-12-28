<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorRequest extends Model
{
    use Moderatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
       'id'
    ];

    /**
     * Model relationships
    */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
