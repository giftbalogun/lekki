<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class State extends Model
{
    public function lgas() {
        return $this->hasMany(Lga::class);
    }
}
