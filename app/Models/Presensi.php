<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'presensi';

    // Set primary key type ke string
    protected $keyType = 'string';

    // Override boot function untuk men-generate UUID secara otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid(); // generate UUID
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, "id_user");
    }
}
