<?php

namespace App\Livewire\Advertisement;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComponentCreate extends Component
{
    use WithFileUploads;
    
    public $iteration1;
    public $iteration2;
    public $iteration3;
    public $iteration4;

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
    public $image1;
    public $image2;
    public $image3;
    public $image4;

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
        'esthetic' => 'required|min:1|max:10',
        'image1' => 'required|image|max:2048',
        'image2' => 'required|image|max:2048',
        'image3' => 'required|image|max:2048',
        'image4' => 'required|image|max:2048'
    ];

    public function mount()
    {
        $this->iteration1 = rand(1, 50);
        $this->iteration2 = rand(51, 100);
        $this->iteration3 = rand(101, 150);
        $this->iteration4 = rand(151, 200);

        $this->validator = 1;
        $this->functioning = 1;
        $this->esthetic = 1;
        $this->user = auth()->user();
    }
    
    public function render()
    {
        return view('livewire..advertisement.component-create');
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
        $this->validate();

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
        $advertisement->image1 = $this->image1->store('public');
        $advertisement->image2 = $this->image2->store('public');
        $advertisement->image3 = $this->image3->store('public');
        $advertisement->image4 = $this->image4->store('public');
        $advertisement->save();

        $this->clear();

        redirect()->route('advertisement.index');
    }

    public function clear()
    {
        $this->iteration1++;
        $this->iteration2++;
        $this->iteration3++;
        $this->iteration4++;

        $this->validator = 1;
        $this->functioning = 1;
        $this->esthetic = 1;

        $this->reset(['vin', 'brand', 'model', 'manufactured', 'year', 'plate', 'mileage', 'image1', 'image2', 'image3', 'image4']);
    }
}
