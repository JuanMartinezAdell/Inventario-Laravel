<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;


class PutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //

            "model" => "required|min:5|max:100" . $this->route("location")->id,
            "city" => "required|min:5|max:100",
            "name" => "required|min:5|max:100",
            "address" => "required|min:5|max:100",

        ];
    }
}
