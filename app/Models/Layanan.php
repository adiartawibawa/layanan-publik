<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Layanan extends Model
{
    use HasUuids;

    protected $table = 'layanan';

    protected $fillable = [
        'name',
        'estimasi',
        'desc'
    ];

    public $timestamps = false;

    public function ketentuans(): MorphMany
    {
        return $this->morphMany(Ketentuan::class, 'ketentuan', 'ketentuan_type', 'ketentuan_id');
    }

    public function permohonans(): HasMany
    {
        return $this->hasMany(Permohonan::class, 'layanan_id');
    }
}
