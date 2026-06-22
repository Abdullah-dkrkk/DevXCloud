<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'sender_id',
        'sender_type',
        'message',
        'options',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'options' => 'array',
    ];

    public function ticket()
    {
        return $this->belongsTo(ChatTicket::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
