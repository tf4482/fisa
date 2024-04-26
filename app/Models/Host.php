<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'hostname',
        'username',
        'device_id',
        'operating_system_id',
        'status',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }
}
