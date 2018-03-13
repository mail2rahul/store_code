<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date_of_birth', 'phone_number', 'marital_status', 'spouse_name'
    ];

    public function address()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

    public function child()
    {
        return $this->hasMany('App\Child');
    }

    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
}
