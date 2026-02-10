<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        // Required form fields
        'full_name',
        'work_email',
        'company',

        // Location & contact
        'country',
        'state',
        'phone',

        // Website logic
        'has_website',
        'website_url',

        // Optional context
        'reason',
        'message',

        // Compliance / meta
        'terms_accepted',
        'terms_accepted_at',
        'ip_address',
        'user_agent',
    ];
}
