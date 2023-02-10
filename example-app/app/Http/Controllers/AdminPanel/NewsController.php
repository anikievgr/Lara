<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news(){
        $news = News::all();
        if ($news->count() == 0) {
            $news = 'null';
           // dd($news);
        }
        $updateNews = 'null';
        //dd($news);
        return view('adminPanel/page/pageForm/pagehome/news',compact('news','updateNews'));
    }
    public  function updatePages($id){
        $updateNews = News::find($id);
        $news = 'null';
        return view('adminPanel/page/pageForm/pagehome/news',compact('news','updateNews'));
        dd($updateNews);
    }
    public function index()
    {
        //
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
        //dd($request->file('image'));
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
       dd($db);
        News::create($db);
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
        $items = News::query()->find($id);
        Storage::disk('public')->delete($items['image']);
        $items->delete();
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
        $new= News::find($id);
        if (array_key_exists('image', $itme)){

            Storage::disk('public')->delete($new['image']);
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
        $new -> update(  $bd);
        return redirect('/admin/pageHome/openAdminNews');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
