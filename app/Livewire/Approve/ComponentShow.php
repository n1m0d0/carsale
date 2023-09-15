<?php

namespace App\Livewire\Approve;

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
        return view('livewire..approve.component-show');
    }

    public function approve()
    {
        $advertisement = $this->advertisement;
        $advertisement->is_publicated = true;
        $advertisement->save();

        redirect()->route('approve.index');
    }

    public function destroy()
    {
        $advertisement = $this->advertisement;
        $advertisement->delete();

        redirect()->route('approve.index');
    }
}
