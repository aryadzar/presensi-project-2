<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerja';
    protected $guarded = [];
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid(); // generate UUID
            }
        });
    }

    public function setUnitKerja()
    {
        return $this->hasMany(SetUnitKerja::class, 'id_unit_kerja');
    }

    public function setRoles()
    {
        return $this->hasMany(SetRole::class, 'id_unit_kerja');
    }
}
