<?php

namespace App\Services;

use App\Interfaces\CreatNewSlideFich;
use App\Services\Models\Slide;

class CreatNewSlide implements CreatNewSlideFich
{

    public function CreatNewSlide($request)
    {
        $path = $request->file('image')->store('uploads', 'public');
        //return view('form', ['path' => $path]);
        //$items = $request->input('title');
        $items = [
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $path,
        ];

        Slide::create($items);
    }
}
