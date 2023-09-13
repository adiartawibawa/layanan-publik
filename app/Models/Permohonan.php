<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permohonan extends Model
{
    use HasUuids;

    protected $table = 'permohonan';

    protected $fillable = [
        'layanan_id',
        'user_id',
        'kode_mohon',
        'is_valid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(StatusPermohonan::class, 'permohonan_id');
    }

    public function latestStatus()
    {
        return $this->hasOne(StatusPermohonan::class)->latest('created_at');
    }

    public function scopeWithLatestStatus($query)
    {
        return $query->with(['latestStatus']);
    }

    public function detail(): HasMany
    {
        return $this->hasMany(DetailPermohonan::class, 'permohonan_id');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i:s');
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i:s');
    }
}
