<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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

    public function ketentuans()
    {
        return $this->morphMany(Ketentuan::class, 'ketentuan');
    }
}
