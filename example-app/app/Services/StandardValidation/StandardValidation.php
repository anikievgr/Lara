<?php

namespace App\Services\StandardValidation;

class StandardValidation implements StandardValidationInterface
{

    public function validation($request)
    {
        $item = $request->validate([
            'title' => 'required|max:150',
            'subtitle' => 'required|max:150',
            'image' => 'required',

        ]);
        $path = $request->file('image')->store('uploads', 'public');
        $item['image'] = $path;
        return $item;
    }
}
