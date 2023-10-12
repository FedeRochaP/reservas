<?php

namespace App\Livewire;

use App\Models\Hospedajes;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarHospedajes extends Component
{
    use WithPagination;
    public $search;
    public $hospedaje;
    public $open;
    public function render()
    {
        $hospedajes = Hospedajes::where('title', 'like', '%'.$this->search.'%')->paginate(9);
        return view('livewire.mostrar-hospedajes', compact('hospedajes'));
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function showModal(Hospedajes $hospedaje){
        $this->hospedaje = $hospedaje;
        $this->open = true;
    }

    public function closeModal(){  
        $this->open = false;
    }


}
