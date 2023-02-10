<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $image = Image::all();
        return view('adminPanel/page/pageForm/pagehome/gImage', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $text = Image::find(1);
        $db = [
            'title' => '',
            'text' => '',
            'image' => ''
        ];
        $text->update($db);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $itme = $request->all();
        $image= Image::find($id);
        if (array_key_exists('image', $itme)){
            
            Storage::disk('public')->delete($image['image']);
            $path = $request->file('image')->store('uploads', 'public');

            $bd = [
                'title' =>  $request['title'],
                'text' =>  $request['text'],
                'image' =>  $path,
            ];
            //dd($bd);
        }else{
        $bd = [
            'title' =>  $request['title'],
            'text' =>  $request['text'],
       
        ];
    }
        $image -> update(  $bd);
          return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
