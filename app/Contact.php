<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'company_id',
        'status',
        'contact_name',
        'phone',
        'email',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
