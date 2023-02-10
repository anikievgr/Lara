<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\HeaderIncubirovane;
use App\Models\TextIncubirovane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IncubirovaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = HeaderIncubirovane::all();
        $text = TextIncubirovane::all();
        return view('adminPanel/page/pageForm/pagehome/incubirovanieFrom', compact('title', 'text'));

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
        $items = HeaderIncubirovane::query()->find($id);
        Storage::disk('public')->delete($items['image']);
        $bd = [
            'title' => '',
            'image' => '',
        ];
        $items->update($bd);
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

        $header= HeaderIncubirovane::find($id);
        if (array_key_exists('image', $itme)){
            Storage::disk('public')->delete($header['image']);
            $path = $request->file('image')->store('uploads', 'public');

            $bd = [
                'title' =>  $request['title'],
                'image' =>  $path,
            ];
            //dd($bd);
        }else{
        $bd = [
            'title' =>  $request['title'],


        ];
    }
        $header->update($bd);
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
