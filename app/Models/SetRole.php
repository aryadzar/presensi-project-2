<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SetRole extends Model
{
    use HasFactory;
    protected $table = 'set_role';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja');
    }

    public function actor(){
        return $this->belongsTo(User::class, 'id_actor');
    }
}
