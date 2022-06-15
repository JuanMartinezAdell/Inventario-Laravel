<?php

namespace App\Http\Requests\Location;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{

    static public function myRules()
    {
        return [
            //

            "model" => "required|min:5|max:100",
            "city" => "required|min:5|max:100",
            "name" => "required|min:5|max:100",
            "address" => "required|min:5|max:100",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $this->myRules();
    }
}
