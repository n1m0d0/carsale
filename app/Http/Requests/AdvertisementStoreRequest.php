<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdvertisementStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vin' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'manufactured' => 'required',
            'year' => 'required',
            'plate' => 'required',
            'mileage' => 'required|min:0',
            'functioning' => 'required|min:1|max:10',
            'esthetic' => 'required|min:1|max:10',
            'image1' => 'required|image|max:2048',
            'image2' => 'required|image|max:2048',
            'image3' => 'required|image|max:2048',
            'image4' => 'required|image|max:2048',
            'price' => 'required|decimal:0,2|min:0'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'is_success' => false,
            'message'   => 'Validation errors',
            'errors'  => $validator->errors(),
        ]));
    }
}
