<?php

namespace App\Livewire\Advertisement;

use App\Models\Advertisement;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComponentEdit extends Component
{
    use WithFileUploads;

    public $advertisement;

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
    public $image1Before;
    public $image2Before;
    public $image3Before;
    public $image4Before;
    public $price;

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
        'price' => 'required|decimal:0,2|min:0'
    ];

    public function mount(Advertisement $advertisement)
    {
        $this->advertisement = $advertisement;
        $this->iteration1 = rand(1, 50);
        $this->iteration2 = rand(51, 100);
        $this->iteration3 = rand(101, 150);
        $this->iteration4 = rand(151, 200);

        $this->validator = 0;
        $this->functioning = 1;
        $this->esthetic = 1;
        $this->user = auth()->user();

        $this->vin = $advertisement->vin;
        $this->brand = $advertisement->brand;
        $this->model = $advertisement->model;
        $this->manufactured = $advertisement->manufactured;
        $this->year = $advertisement->year;
        $this->plate = $advertisement->plate;
        $this->mileage = $advertisement->mileage;
        $this->functioning = $advertisement->functioning;
        $this->esthetic = $advertisement->esthetic;
        $this->image1Before = $advertisement->image1;
        $this->image2Before = $advertisement->image2;
        $this->image3Before = $advertisement->image3;
        $this->image4Before = $advertisement->image4;
        $this->price = $advertisement->price;
    }

    public function render()
    {
        return view('livewire..advertisement.component-edit');
    }

    public function update()
    {
        $this->validate();

        $advertisement = $this->advertisement;

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

        if ($this->image1 != null) {
            $this->validate([
                'image1' => 'required|image|max:2048',
            ]);

            $advertisement->image1 = $this->image1->store('public');
        }

        if ($this->image2 != null) {
            $this->validate([
                'image2' => 'required|image|max:2048',
            ]);

            $advertisement->image2 = $this->image2->store('public');
        }

        if ($this->image3 != null) {
            $this->validate([
                'image3' => 'required|image|max:2048',
            ]);

            $advertisement->image3 = $this->image3->store('public');
        }

        if ($this->image3 != null) {
            $this->validate([
                'image4' => 'required|image|max:2048',
            ]);

            $advertisement->image4 = $this->image4->store('public');
        }
        $advertisement->price = $this->price;
        $advertisement->save();

        redirect()->route('advertisement.index');
    }
}
