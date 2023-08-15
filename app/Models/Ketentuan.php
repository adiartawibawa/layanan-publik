<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketentuan extends Model
{
    protected $table = 'ketentuan';

    protected $fillable = [
        'name',
        'desc',
        'type',
        'is_required'
    ];

    public function ketentuan()
    {
        return $this->morphTo('ketentuan');
    }
}
