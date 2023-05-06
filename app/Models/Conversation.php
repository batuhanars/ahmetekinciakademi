<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        "sender_id",
        "receiver_id",
        "last_time_message",
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, "sender_id");
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, "receiver_id");
    }

    public function messages()
    {
        return $this->hasMany(CustomerMessage::class);
    }

    public function message()
    {
        return $this->hasOne(CustomerMessage::class);
    }

    public function messageCount($receiverId)
    {
        return $this->messages()->where("receiver_id", $receiverId)->count();
    }
}
