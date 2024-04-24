<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DeviceType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    use HasUuids;

    protected function casts(): array
    {
        return [
            'device_type' => DeviceType::class,
        ];
    }

    protected $fillable = [
        'model',
        'device_type',
        'mac_address',
    ];
}
