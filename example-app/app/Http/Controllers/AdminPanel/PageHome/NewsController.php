<?php

namespace App\Http\Controllers\AdminPanel\PageHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\SliderRequest;
use App\Models\News;
use App\Services\StandardValidation\StandardValidationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('adminPanel/page/pageHome/news/news', compact('news'));
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
    public function store(NewsRequest $request)
    {
        $news = $request->all();
        $news['image'] = $request->file('image')->store('uploads', 'public');
        News::create($news);
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
        $news = News::find($id);
        return view('adminPanel/page/pageHome/news/newsUpdate', compact('news'));
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
        $news= News::find($id);
        $newsUpdate =   $request->all();
        if(array_key_exists('image', $request->all())){
            Storage::disk('public')->delete($news['image']);
            $newsUpdate['image'] = $request->file('image')->store('uploads', 'public');
        }
        $news->update($newsUpdate);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::query()->find($id);
        Storage::disk('public')->delete($news['image']);
        $news->delete();
        return redirect()->back();
    }
}
