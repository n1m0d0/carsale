<?php

namespace App\Livewire\Approve;

use App\Models\Advertisement;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentIndex extends Component
{
    use WithPagination;

    public $user;

    public $search;

    public $advertisement_id;

    public $deleteModal;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->deleteModal = false;
    }

    public function render()
    {
        $queryAdvertisement = Advertisement::query()
            ->when($this->search, function ($query) {
                $query->where('brand', 'like', '%' . $this->search . '%')
                ->orwhere('model', 'like', '%' . $this->search . '%')
                ->orwhere('year', 'like', '%' . $this->search . '%')
                ->orwhere('price', 'like', '%' . $this->search . '%');
            });
        $advertisements = $queryAdvertisement->orderBy('id', 'DESC')->paginate(7);
        return view('livewire..approve.component-index', compact('advertisements'));
    }

    public function show($id)
    {
        redirect()->route('approve.show', $id);
    }

    public function resetSearch()
    {
        $this->reset(['search']);
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
