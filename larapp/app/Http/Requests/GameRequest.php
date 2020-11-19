<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // Edit Form
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'max:1000',
                'user_id' => 'required',
                'category_id' => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:99',

            ];
        } else {
            // Create Form
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|max:1000',
                'user_id' => 'required',
                'category_id' => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:99',
            ];
        }
    }
}
