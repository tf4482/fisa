<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceStatus extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'host_id',
    ];

    public function host()
    {
        return $this->belongsTo(Host::class);
    }

    public function status()
    {
        return $this->belongsTo(Host::class);
    }
}
