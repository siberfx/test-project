<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'logo',
        'name',
        'address',
        'website',
    ];

    public function detail()
    {
        return $this->belongsTo(Company::class);
    }
}
