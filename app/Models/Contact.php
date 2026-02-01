<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name','last_name','job_title','work_email','company',
        'employed','mobile','country','language',
        'terms_accepted','terms_accepted_at','ip_address','user_agent'
    ];
}