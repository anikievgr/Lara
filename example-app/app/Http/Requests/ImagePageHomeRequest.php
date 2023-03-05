<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagePageHomeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:150',
            'text' =>  'required',
            'image' =>  'required',
        ];
    }
}
