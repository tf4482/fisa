<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'inspect' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'status',
        'ip',
        'mac',
        'type',
        'avatar',
        'inspect',
        'last_check',
    ];
}
