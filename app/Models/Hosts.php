<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
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
}
