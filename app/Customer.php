<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * Fields to be guarded. An empty signifies all properties are mass-assignable
     *
     * @var array $guarded
     */
    protected $guarded = [];

    /**
     * Set customer's first name value
     *
     * @param $value
     * @return void
     */
    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * Set customer's last name attribute
     *
     * @param $value
     * @return void
     */
    public function setLastNameAttribute($value): void
    {
        $this->attributes['last_name'] = ucfirst($value);
    }
}
