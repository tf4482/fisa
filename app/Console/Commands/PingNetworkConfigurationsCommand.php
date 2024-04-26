<?php

namespace App\Console\Commands;

use App\Models\Host;
use App\Models\NetworkConfiguration;
use Illuminate\Console\Command;

class PingNetworkConfigurationsCommand extends Command
{
    protected $signature = 'network:ping';

    protected $description = 'Ping all IP addresses in network configurations and update host status';

    protected string $pingResult;

    public function handle()
    {
        $networkConfigurations = NetworkConfiguration::all();

        foreach ($networkConfigurations as $networkConfiguration) {
            if ($networkConfiguration->pingcheck) {
                $ipAddress = $networkConfiguration->ip_address;
                $pingResult = $this->ping($ipAddress);
                $host = Host::find($networkConfiguration->host_id);

                if ($host) {
                    $host->status = $pingResult;
                    $host->save();
                }
            }
        }
    }

    public function ping($ipAddress): string
    {
        $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';

        if ($isWindows) {
            $response = shell_exec("ping -n 1 $ipAddress");
            $reachable = strpos($response, 'TTL=') !== false;
        } else {
            $response = shell_exec("ping -c 1 $ipAddress");
            $reachable = strpos($response, '1 received') !== false;
        }

        return $response ? 'online' : 'offline';
    }
}
