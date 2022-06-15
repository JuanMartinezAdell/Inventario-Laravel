<?php

namespace App\Http\Requests\Product;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
    static public function myRules()
    {
        return [
            //
            "code" => "required|min:3|max:100|unique:products",
            "description" => "required|min:5",
            "maker" => "required|min:5",
            "model" => "required|min:5|max:500",
            "content" => "required|min:5",
            "location_id" => "required",
            "condition" => "required",
            'stock' => "required|integer"
            //"image" => "mimes:jpeg,jpg,png|max:10240"

        ];
    }
}
