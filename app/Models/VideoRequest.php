<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class VideoRequest extends Model
{
    protected $table = 'video_requests';

    protected $fillable = [
        'user_id',
        'video_id',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'approved'
            && ($this->expires_at === null || $this->expires_at->isFuture());
    }
}
