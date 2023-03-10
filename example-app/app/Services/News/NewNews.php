<?php

namespace App\Services\News;

use App\Services\Models\News;

class NewNews implements CreateNewNews
{

    public function newNews($request)
    {

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
