<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DetailPermohonan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'detail_permohonan';

    protected $fillable = [
        'id',
        'permohonan_id',
        'category',
        'setting_type',
        'setting_key',
        'name',
        'string_value',
        'text_value',
        'boolean_value',
        'integer_value',
        'date_value',
        'decimal_value',
    ];

    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public static function getCategories($permohonan_id)
    {
        return DetailPermohonan::select('category')->where('permohonan_id', '=', $permohonan_id)->orderBy('category', 'asc')->groupBy('category')->get()->pluck('category');
    }

    public static function getDetailPermohonan($permohonan_id)
    {
        $permohonans = DetailPermohonan::orderBy('category', 'asc')->get();
        $categories = DetailPermohonan::getDetailPermohonan($permohonan_id);

        $groupedPermohonan = [];

        foreach ($categories as $category) {
            if ($permohonans) {
                foreach ($permohonans as $permohonan) {
                    if ($permohonan->category == $category) {
                        $groupedPermohonans[$category][] = $permohonan;
                    }
                }
            }
        }

        return $groupedPermohonans;
    }
}
