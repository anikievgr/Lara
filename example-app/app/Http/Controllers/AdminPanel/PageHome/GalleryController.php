<?php

namespace App\Http\Controllers\AdminPanel\PageHome;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Category::with('posts')->get();
        return view('adminPanel/page/pageHome/gallery', compact('gallery'));
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

        if($request['select'] == 'buutonAddCategory'){
            $newSlide =  $request->validate([
                'new-category' => 'required|max:50',
                'image' => 'required',
            ]);
            $category = Category::create(['title' => $newSlide['new-category']]);
            $category = $category['id'];
        }else{
            $newSlide =  $request->validate([
                'select' => 'required',
                'image' => 'required',
            ]);
            $category =$request['select'];
        }
        Post::create([
            'image' => $request->file('image')->store('uploads', 'public'),
            'categoty_id' => $category
        ]);
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
        $gallery = Category::with('posts')->find($id);
        foreach($gallery->posts as $key=> $image){
            Storage::disk('public')->delete($image['image']);
            $image->delete();
        }
        $gallery->delete();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::query()->find($id);
        Storage::disk('public')->delete($post['image']);
        $post->delete();
        return redirect()->back();
    }
}
