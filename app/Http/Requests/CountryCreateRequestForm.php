<?php

namespace App\Http\Requests;

use App\ApiModels\RequestModel\CountryRequestModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CountryCreateRequestForm extends CommonRequestForm
{
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
            'title' => 'required|string|max:30'
        ];
    }

    public function body(): CountryRequestModel
    {
        return $this->innerBodyObject(new CountryRequestModel());
    }
}
