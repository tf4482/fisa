<?php

namespace App\Livewire;

use Livewire\Component;

class HostComponent extends Component
{
    public $host;

    public function mount($host = null)
    {
        $this->host = $host;
    }

    public function render()
    {
        return view('livewire.host-component');
    }
}
