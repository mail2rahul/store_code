<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LifeInsurance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'insured_name', 'type', 'death_benefit_amount'
    ];
}
