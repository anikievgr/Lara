<?php

namespace App\Http\Controllers\AdminPanel\PageHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagePageHomeRequest;
use App\Services\Models\Image;
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
        return view('adminPanel/page/pageHome/image', compact('image'));
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
    public function update(ImagePageHomeRequest $request, $id)
    {
        $path = null;
        $image= Image::find($id);
        if (array_key_exists('image', $request->all())){
            Storage::disk('public')->delete($image['image']);
            $path = $request->file('image')->store('uploads', 'public');
        }
        $request = [
            'title' =>  $request['title'],
            'text' =>  $request['text'],
            'image' =>  $path,
        ];

        $image -> update(  $request);
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
        $text = Image::find(1);
        $db = [
            'title' => '',
            'text' => '',
            'image' => ''
        ];
        $text->update($db);
        return redirect()->back();
    }
}
