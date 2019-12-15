<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'address_line_1',
        'address_line_2',
        'postcode',
        'city',
        'contact_telephone_number',
        'is_newsletter_subscriber',
        'customer_type'
    ];

    public function user()
    {
        $this->hasOne('App\User');
    }
}
