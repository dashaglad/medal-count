<?php

namespace App\Http\Requests;

use App\ApiModels\RequestModel\MedalRequestModel;

class MedalCreateRequestForm extends CommonRequestForm
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'sportId' => 'required|exists:sports,id',
            'athleteId' => 'required|exists:athletes,id'
        ];
    }

    public function body(): MedalRequestModel
    {
        return $this->innerBodyObject(new MedalRequestModel());
    }
}
