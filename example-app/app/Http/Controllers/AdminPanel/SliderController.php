<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
     public function slider(){
    $items = Slide::all();
    //dd($items );
    if($items->count()  == 0){
      $fierstItems = ['null'];
      $items = ['null'];
      $id = 'null';
      //dd($id,$items, $fierstItems);
    }else{
      $fierstItems = $items[0];
      //dd($fierstItems['id']);
      $items = $items->slice(1);
      $id = '';
    }
      return view('adminPanel/page/pageForm/pagehome/slider',compact('items','fierstItems','id'));
    }
    /**
     * Display a listing of the resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $items = Slide::query()->find($id);
        $fierstItems = [];
         //dd($items);
        return view('adminPanel/page/pageForm/pagehome/slider',compact('items','fierstItems', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
        return 'crest';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
         dd('s') ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
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
        $itemUpdate =   $request->all();
        $items = Slide::query()->find($id);
        //dd($itemUpdate );
        if (array_key_exists('image', $itemUpdate)) {
            Storage::disk('public')->delete($items['image']);
            $path = $request->file('image')->store('uploads', 'public');
            $itemUpdate['image'] = $path;
            //dd($itemUpdate);


           // dd($itemUpdate,'y');
        }
         $items -> update(  $itemUpdate);
         return Redirect::route('adminSlider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                dd($id) ;
    }
      public function delete($id)
    {
                $items = Slide::query()->find($id);
                Storage::disk('public')->delete($items['image']);
                $items->delete();
                return redirect()->back();
    }
}
