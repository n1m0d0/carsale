<?php

namespace App\Livewire;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ComponentAdvertisement extends Component
{
    public $user;
    public $vin;
    public $brand;
    public $model;
    public $manufactured;
    public $year;
    public $plate;
    public $mileage;
    public $functioning;
    public $esthetic;

    public $validator;

    protected $rules = [
        'vin' => 'required',
        'brand' => 'required',
        'model' => 'required',
        'manufactured' => 'required',
        'year' => 'required',
        'plate' => 'required',
        'mileage' => 'required|min:1',
        'functioning' => 'required|min:1|max:10',
        'esthetic' => 'required|min:1|max:10'
    ];

    public function mount()
    {
        $this->validator = 1;
        $this->functioning = 1;
        $this->esthetic = 1;
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.component-advertisement');
    }

    public function searchVin()
    {
        $this->validate([
            'vin' => 'required'
        ]);

        $response = Http::withUrlParameters([
            'vin' => $this->vin,
        ])->get('https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/{vin}', [
            'format' => 'json'
        ]);
        if ($response->successful()) {
            $data = $response->json();

            $pieces = explode("-", $data['Results'][4]['Value']);

            $this->validator = $pieces[0];

            if ($this->validator == 0) {
                $this->brand = $data['Results'][7]['Value'];
                $this->model = $data['Results'][9]['Value'];
                $this->manufactured = $data['Results'][8]['Value'];
                $this->year = $data['Results'][10]['Value'];
            } else {
            }
        } else {
        }
    }

    public function store()
    {
        $this->validate([
            'vin' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'manufactured' => 'required',
            'year' => 'required',
            'plate' => 'required',
            'mileage' => 'required|numeric|min:1',
            'functioning' => 'required|numeric|min:1|max:10',
            'esthetic' => 'required|numeric|min:1|max:10'
        ]);

        $advertisement = new Advertisement();
        $advertisement->user_id = $this->user->id;
        $advertisement->vin = $this->vin;
        $advertisement->brand = $this->brand;
        $advertisement->model = $this->model;
        $advertisement->manufactured = $this->manufactured;
        $advertisement->year = $this->year;
        $advertisement->plate = $this->plate;
        $advertisement->mileage = $this->mileage;
        $advertisement->functioning = $this->functioning;
        $advertisement->esthetic = $this->esthetic;
        $advertisement->save();

        $this->clear();
    }

    public function clear()
    {
        $this->validator = 1;
        $this->functioning = 1;
        $this->esthetic = 1;
        $this->reset(['vin', 'brand', 'model', 'manufactured', 'year', 'plate', 'mileage']);
    }
}
