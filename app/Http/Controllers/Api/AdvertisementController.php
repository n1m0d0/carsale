<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::where('is_publicated', 1)->paginate(20);
        return new AdvertisementCollection($advertisements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$advertisement = new Advertisement();
        $advertisement->user_id = $request->user->id;
        $advertisement->vin = $request->vin;
        $advertisement->brand = $request->brand;
        $advertisement->model = $request->model;
        $advertisement->manufactured = $request->manufactured;
        $advertisement->year = $request->year;
        $advertisement->plate = $request->plate;
        $advertisement->mileage = $request->mileage;
        $advertisement->functioning = $request->functioning;
        $advertisement->esthetic = $request->esthetic;
        $advertisement->image1 = $request->image1->store('public');
        $advertisement->image2 = $request->image2->store('public');
        $advertisement->image3 = $request->image3->store('public');
        $advertisement->image4 = $request->image4->store('public');
        $advertisement->price = $request->price;
        $advertisement->save();

        return new AdvertisementResource($advertisement);*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $advertisement = Advertisement::findOrFail($id);
            return new AdvertisementResource($advertisement);
        } catch (\Exception $e) {
            return response()->json([
                'is_success' => false,
                'message'   => 'Validation errors',
                'errors'  => [
                    'id' => ['Id not found!']
                ],
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
