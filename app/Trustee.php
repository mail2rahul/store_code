<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trustee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'first_name', 'middle_name', 'last_name', 'choice_order',
        'phone_number', 'is_final' , 'co_trustee'
    ];

    public function address()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
}
