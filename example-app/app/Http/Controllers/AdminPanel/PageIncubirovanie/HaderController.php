<?php

namespace App\Http\Controllers\AdminPanel\PageIncubirovanie;

use App\Http\Controllers\Controller;
use App\Http\Requests\HaderIncubirovanieRequest;
use App\Models\HeaderIncubirovane;
use App\Models\Image;
use App\Models\TextIncubirovane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = HeaderIncubirovane::all();
        return view('adminPanel/page/pageIncubirovanie/header', compact('image'));
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
        //
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
    public function update(HaderIncubirovanieRequest $request, $id)
    {
        $header= HeaderIncubirovane::find($id);
        $path = null;
        if (array_key_exists('image', $request->all())){
            Storage::disk('public')->delete($header['image']);
            $path = $request->file('image')->store('uploads', 'public');
        }
        $request = [
            'title' =>  $request['title'],
            'image' =>  $path,
        ];
        $header->update($request);
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
        $items = HeaderIncubirovane::query()->find($id);
        Storage::disk('public')->delete($items['image']);
        $bd = [
            'title' => '',
            'image' => '',
        ];
        $items->update($bd);
        return redirect()->back();
    }
}
