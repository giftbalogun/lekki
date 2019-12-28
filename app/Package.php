<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * variables
     *
     * @var array
     */
    public $specialPricing;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
     ];

      /**
     * Model rlationships
     */
    public function lgaPrice()
    {
        return $this->hasMany(PackageLgaPrice::class);
    }

    public function statePrice()
    {
        return $this->hasMany(PackageStatePrice::class);
    }
    /**
     * functions
     */
    public function hasSpecialLgaPricing($lgaId)
    {
        $lgaPrice = $this->lgaPrice()->where('lga_id', $lgaId)->first();
        if ($lgaPrice != NULL) {
            $this->specialPricing = $lgaPrice->price_details;
            return true;
        } else {
            return false;
        }
    }

    public function hasSpecialStatePricing($stateId)
    {
        $statePrice = $this->statePrice()->where('state_id', $stateId)->first();
        if ($statePrice != NULL) {
            $this->specialPricing = $statePrice->price_details;
            return true;
        } else {
            return false;
        }
    }

    public function getPackagePricing($lgaId,$stateId)
    {
        if ($this->hasSpecialLgaPricing($lgaId)) {
            $parray = json_decode($this->specialPricing);
            return (array)$parray;
        } else if ($this->hasSpecialStatePricing($stateId)) {
            $parray = json_decode($this->specialPricing);
            return (array)$parray;
        } else {
            $parray = json_decode($this->default_price_details);
            return (array)$parray;
        }
    }
}
