<?php

namespace App\Http\Requests;

use App\ApiModels\RequestModel\SportRequestModel;

class SportCreateRequestForm extends CommonRequestForm
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:30'
        ];
    }

    public function body(): SportRequestModel
    {
        return $this->innerBodyObject(new SportRequestModel());
    }
}
