<?php

namespace App\Models;

use App\Enums\ComputerType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'inspect' => 'boolean',
        'type' => ComputerType::class,
    ];

    protected $fillable = [
        'name',
        'status',
        'ip',
        'mac',
        'avatar',
        'inspect',
        'last_check',
        'type',
    ];
}
