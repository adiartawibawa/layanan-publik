<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusPermohonan extends Model
{
    protected $table = 'status_permohonan';

    protected $fillable = [
        'permohonan_id',
        'aktivitas',
        'keterangan'
    ];

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i:s');
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i:s');
    }

    public function permohonans(): BelongsTo
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public function latestStatus()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id')->latest();
    }
}
