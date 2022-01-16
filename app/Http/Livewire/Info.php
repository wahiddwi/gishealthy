<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Kamar;
use App\InfoKamar;
use App\Laykes;

class Info extends Component
{

    public $kamars;
    public $info_kamars;
    public $laykeses;
    public $statuses;

    public $selectedKamar = null;
    public $selectedInfoKamar = null;
    public $selectedLaykes = null;
    public $selectedStatus = null;

    public function mount($selectedInfoKamar = null)
    {
        $this->laykeses = Laykes::all();
        $this->kamars = Kamar::all();
        $this->info_kamars = InfoKamar::all();
        $this->selectedInfoKamar = $selectedInfoKamar;

        if (!is_null($selectedInfoKamar)) {
            $info = InfoKamar::with('info_kamar.kamar.laykes')->find($selectedInfoKamar);
            if ($info) {
                $this->statuses = InfoKamar::where('id', $info->id_kamar)->get();
                $this->kamars = InfoKamar::where('id_kamar', $info->kamar->id_kamar)->get();
                $this->laykeses = Kamar::where('id_rumahsakit', $info->rumah_sakit->id_rumahsakit)->get();
            }
        }

    }

    public function render()
    {
        return view('livewire.info');
    }

    public function updatedSelectedLaykes($laykes)
    {
        $this->kamars = Kamar::where('id_rumahsakit', $laykes)->get();
    }

    public function updatedSelectedInfoKamar($kamar)
    {
        $this->info_kamars = InfoKamar::where('id_kamar', $kamar)->get();
    }
    public function updatedSelectedStatus($info_kamar)
    {
        $this->statuses = InfoKamar::where('id_kamar', $info_kamar)->get();
    }
}
