<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;

class EventList extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::orderByDesc('tanggal')->get();
    }

    public function render()
    {
        return view('livewire.admin.event-list');
    }
}
