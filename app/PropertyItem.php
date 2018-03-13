<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'property_item_id', 'value', 'description'
    ];
}
