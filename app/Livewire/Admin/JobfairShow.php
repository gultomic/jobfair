<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Jobfair;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class JobfairShow extends Component
{
    use WithFileUploads;

    public $id;
    public $preview;
    public $itteration = 0;

    #[Validate('required')]
    public $nama = '';

    #[Validate('image|max:1024')]
    public $image;

    public function mount($id)
    {
        $row = Jobfair::findOrFail($id);

        $this->nama = $row->nama;
        $this->preview = $row->refs['image'];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.jobfair-show');
    }

    public function save()
    {
        $row['nama'] = $this->nama;

        if ($this->image) {
            $ext = $this->image->getClientOriginalExtension();
            $name = "jf" . Carbon::now()->format("Ymdhis.") . $ext;

            $this->image->storeAs(path: 'public/banners', name: $name);
            $row['refs']['image'] = "/storage/banners/$name";
        }

        Jobfair::find($this->id)->update($row);

        $this->redirectRoute('admin.jobfair.index');
    }

    public function undoImage()
    {
        $this->image = null;
        $this->itteration++;
    }
}
