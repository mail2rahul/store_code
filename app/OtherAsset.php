<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherAsset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'name', 'description', 'estimate_value', 'remaining_mortgage',
    ];
}
