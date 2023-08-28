<?php

namespace App\Http\Requests;

use App\ApiModels\RequestModel\AthleteRequestModel;

class AthleteCreateRequestForm extends CommonRequestForm
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:90',
            'countryId' => 'required|integer|exists:countries,id'
        ];
    }

    public function body(): AthleteRequestModel
    {
        return $this->innerBodyObject(new AthleteRequestModel());
    }
}
