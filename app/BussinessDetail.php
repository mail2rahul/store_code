<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BussinessDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'name', 'type', 'percentage_own', 'total_value','description'
    ];
}
