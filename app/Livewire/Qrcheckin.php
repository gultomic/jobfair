<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\Attributes\Js;
use Laravel\Sanctum\PersonalAccessToken;

class Qrcheckin extends Component
{
    public $token = "--";
    public $event;
    public $user;
    public $attend;

    public function mount($eid)
    {
        $this->check();
        $this->event = Event::find($eid);

        $this->attend = $this->event->kehadiran
            ->where('user_id', 1)
            ->first();
    }

    public function render()
    {
        return view('livewire.qrcheckin');
    }

    #[Js]
    public function check()
    {
        return <<<'JS'
            $wire.token = localStorage.getItem('token');
        JS;
    }
}
