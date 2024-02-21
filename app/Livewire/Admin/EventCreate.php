<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Jobfair;
use Livewire\Component;
use Livewire\Attributes\Layout;

class EventCreate extends Component
{
    public $tanggal = '';
    public $lokasi = '';
    public $keterangan = '';
    public $jobfair = null;
    public $jfList = null;
    public $img = null;

    public function mount()
    {
        $this->jfList = Jobfair::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.event-create');
    }

    public function save() {
        Event::create([
            'jobfair_id' => $this->jobfair,
            'tanggal' => $this->tanggal,
            'refs' => [
                'lokasi' => $this->lokasi,
                'keterangan' => $this->keterangan,
            ]
        ]);

        return $this->redirectRoute('admin.dashboard');
    }

    public function updatedJobfair()
    {
        if ($this->jobfair != null) {
            $this->img = Jobfair::find($this->jobfair)->refs['image'];
        } else {
            $this->img = null;
        }
    }
}
