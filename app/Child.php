<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'first_name', 'middle_name', 'last_name', 'date_of_birth',
        'is_step_child', 'is_minor'
    ];

    public function address()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
}
