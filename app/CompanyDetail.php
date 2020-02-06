<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $fillable = [
        'company_id',
        'contact_name',
        'phone',
        'email',
    ];

    public function detail()
    {
        return $this->belongsTo(Company::class);
    }
}
