<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'estimate_value', 'remaining_mortgage', 'type', 'description'
    ];
}
