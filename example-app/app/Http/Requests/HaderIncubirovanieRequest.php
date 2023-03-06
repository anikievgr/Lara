<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HaderIncubirovanieRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|max:150',
            'image' =>  'required',
        ];
    }
}
