<?php

namespace App\Livewire\Advertisement;

use App\Models\Advertisement;
use Livewire\Component;

class ComponentShow extends Component
{
    public $advertisement;
    
    public function mount(Advertisement $advertisement)
    {
        $this->$advertisement = $advertisement;
    }

    public function render()
    {
        return view('livewire..advertisement.component-show');
    }
}
