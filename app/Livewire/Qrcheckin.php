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
        // $this->token = $this->js("localStorage.getItem('token')");
        // $pat = PersonalAccessToken::where('token', $this->token)->first();
        // $this->user = $pat->tokenable;
        // $this->js("alert(localStorage.getItem('token'))");
        // dd($this->token);

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
