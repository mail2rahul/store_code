<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalAssest extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'username', 'asset_type', 'password'
    ];
}
