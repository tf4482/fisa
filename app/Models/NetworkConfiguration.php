<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkConfiguration extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'ip_address',
        'sshport',
        'host_id',
        'pingcheck',
    ];

    public function host()
    {
        return $this->belongsTo(Host::class);
    }
}
