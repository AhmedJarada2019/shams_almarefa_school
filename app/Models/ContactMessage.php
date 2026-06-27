<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'ip_address', 'is_read', 'read_at', 'read_by',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function reader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'read_by');
    }
}
