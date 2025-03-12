<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'message',
        'link',
        'status',
    ];

    /**
     * Relationship to the recipient user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include unread notifications
     */
    public function scopeUnread($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope a query to only include read notifications
     */
    public function scopeRead($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query for a specific user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Mark this notification as read
     */
    public function markAsRead()
    {
        return $this->update(['status' => 1]);
    }
}
