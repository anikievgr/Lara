<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Array_;

class GalleryController extends Controller
{
    public function gallery(){
          $catygories = Category::with('posts')->get();
           $items = $catygories;


      return view('adminPanel/page/pageForm/pagehome/galerea', compact('items', 'catygories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            if (!empty($request['new-categori'])){
                $request = [
                    'title' =>   $request['new-categori']
                ];
                $data = Category::create($request);
                $id = $data['id'];


            }else{
                $id = $request['select'];

            }
            $path = $request->file('image')->store('uploads', 'public');
            $post = [
                'image' =>   $path,
                'categoty_id' => $id
            ];
            Post::create($post);

              return redirect('/admin/pageHome/openAdminGalerea');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $items = Post::query()->find($id);

                Storage::disk('public')->delete($items['image']);
                $items->delete();
                return redirect()->back();
    }
    public function deleteCategory($id)
    {

        $items = Category::query()->find($id);
        $items->delete();
          foreach($items->posts as $key=> $image){
                $img[$image['id']] = $image['image'];
                Storage::disk('public')->delete($image['image']);
               $imag = Post::query()->find($image['id']);
                $imag->delete();

            }
            return redirect('/admin/pageHome/openAdminGalerea');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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

    }
}
