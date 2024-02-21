<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Jobfair;
use Livewire\Component;
use Livewire\Attributes\Layout;

class EventShow extends Component
{
    public $uuid = null;
    public $tanggal = '';
    public $lokasi = '';
    public $keterangan = '';
    public $jobfair = null;
    public $jfList = null;
    public $img = null;

    public function mount($id)
    {
        $this->uuid = $id;
        $this->jfList = Jobfair::all();

        $row = Event::findOrFail($id);
        $this->tanggal = $row->tanggal;
        $this->lokasi = $row->refs['lokasi'];
        $this->keterangan = $row->refs['keterangan'];
        $this->jobfair = $row->jobfair_id;
        $this->img = $row->jobfair->refs['image'];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.event-show');
    }

    public function save() {
        Event::find($this->uuid)->update([
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
