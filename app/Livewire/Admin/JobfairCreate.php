<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Jobfair;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class JobfairCreate extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $nama = '';

    #[Validate('image|max:1024')]
    public $image;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.jobfair-create');
    }

    public function save()
    {
        $ext = $this->image->getClientOriginalExtension();
        $name = "jf" . Carbon::now()->format("Ymdhis.") . $ext;

        $this->image->storeAs(path: 'public/banners', name: $name);

        $this->validate();

        Jobfair::create([
            'nama' => $this->nama,
            'refs' => [
                'image' => "/storage/banners/$name"
            ]
        ]);

        $this->redirectRoute('admin.jobfair.index');
    }
}
