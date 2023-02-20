<?php

namespace App\Services\DateBase;

class database implements databaseInreface
{

    public function add($request, $model)
    {
        dd($model);
        if (array_key_exists('image', $request->all())){


        if (empty($request['image'])) {
            $path = 'null';

        }     }
        else{
            $path = $request->file('image')->store('uploads', 'public');
        }
        $db =[
            'title'=> $request['title'],
            'text'=> $request['text'],
            'image'=> $path
        ];
        //dd($db);
        // TODO: Implement add() method.
    }
}
