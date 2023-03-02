<?php

namespace App\Http\Controllers\Adminpanel\PageHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardValidation;
use App\Models\Slide;
use App\Services\StandardValidation\StandardValidationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('adminPanel/page/pageHome/slider/slider', compact('slides'));
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
    public function store(Request $request, StandardValidationInterface $validation )
    {
        $newSlide = $validation->validation($request);
         Slide::create($newSlide);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);
        return view('adminPanel/page/pageHome/slider/slideUpdate', compact('slide'));
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
        $slide= Slide::find($id);
        $slideUpdate =   $request->all();
        if(array_key_exists('image', $request->all())){
            Storage::disk('public')->delete($slide['image']);
            $path = $request->file('image')->store('uploads', 'public');
            $slideUpdate['image'] = $path;
        }
        $slide->update($slideUpdate);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::query()->find($id);
        $slide->delete();
        return redirect()->back();
    }
}
