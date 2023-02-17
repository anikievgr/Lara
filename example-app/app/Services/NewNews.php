<?php

namespace App\Services;

use App\Models\News;
use App\Interfaces\CreateNewNews;

class NewNews implements CreateNewNews
{

    public function newNews($request)
    {
        dd(123);
        if (empty($request['image'])) {
            $path = 'null';

        }
        else{
            $path = $request->file('image')->store('uploads', 'public');
        }
        $db =[
            'title'=> $request['title'],
            'text'=> $request['text'],
            'image'=> $path
        ];
        //dd($db);
        News::create($db);
    }
}
