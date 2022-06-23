<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'country_id' => 'required',
            'Villa_category' => 'required',
            'city' => 'required',
            'address' => 'required',
            'number' => 'required',
            // 'capacity' => 'required',
            'number_of_people' => 'required',
            'type' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            //'floor' => 'required',
            'description' => 'required',
            'price_per_night' => 'required',
            'currency' => 'required',
            //'each_extra_guest' => 'required',
            //'final_cleaning' => 'required',
            'city_tax' => 'required',
            'property_url' => 'required',
        ];
    }
}
