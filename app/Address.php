<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_type', 'entity_id', 'address_line_one', 'address_line_two', 'country_id',
        'state', 'city', 'post_code'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

}
