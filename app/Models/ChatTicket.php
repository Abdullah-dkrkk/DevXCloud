<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'user_id',
        'session_id',
        'name',
        'email',
        'form_type',
        'form_data',
        'status',
        'assigned_to',
        'last_activity_at',
        'closed_at',
    ];

    protected $casts = [
        'form_data' => 'array',
        'last_activity_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'ticket_id');
    }
}
