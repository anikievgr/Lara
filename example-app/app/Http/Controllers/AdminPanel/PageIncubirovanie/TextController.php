<?php

namespace App\Http\Controllers\AdminPanel\PageIncubirovanie;

use App\Http\Controllers\Controller;
use App\Http\Requests\TextRequest;
use App\Models\HeaderIncubirovane;
use App\Models\TextIncubirovane;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $title = HeaderIncubirovane::all();
        $text = TextIncubirovane::all();
        return view('adminPanel/page/pageIncubirovanie/text', compact('title', 'text'));
    }
    public function createNewText(TextRequest $request)
    {
        TextIncubirovane::create($request->all());
        return redirect()->back();
    }
    public function updateTitle(Request $request)
    {
        $title = HeaderIncubirovane::find(1);
        $title->update($request->all());
        return redirect()->back();
    }
    public function updateText(Request $request, $id)
    {
        $text = TextIncubirovane::find($id);
        $text -> update([
            'title' => $request['title'],
            'text' => $request['text']
        ]);
        return redirect()->back();
    }
    public function deleteTitle()
    {
        $text = HeaderIncubirovane::find(1);

        $text->update([
            'title' => '',
            'text' => ''
        ]);
        return redirect()->back();
    }
    public function deleteText($id)
    {
        $text = TextIncubirovane::find($id);
        $text->delete();
        return redirect()->back();
    }
}
