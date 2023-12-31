<?php

namespace App\Livewire\Advertisement;

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
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        $advertisements = $queryAdvertisement->where('user_id', $this->user->id)->orderBy('id', 'DESC')->paginate(6);
        return view('livewire..advertisement.component-index', compact('advertisements'));
    }

    public function create()
    {
        redirect()->route('advertisement.create');
    }

    public function show($id)
    {
        redirect()->route('advertisement.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('advertisement.edit', $id);
    }

    public function destroy($id)
    {
        $this->advertisement_id = $id;
        $this->deleteModal = true;
    }

    public function delete()
    {
        $advertisement = Advertisement::find($this->advertisement_id);
        $advertisement->delete();

        $this->deleteModal = false;
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
