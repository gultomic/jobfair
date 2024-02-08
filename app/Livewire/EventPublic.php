<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventPublic extends Component
{
    public function render()
    {
        return view('livewire.event-public', [
            'collection' => Event::all()
        ]);
    }
}
