<?php

namespace App\Http\Controllers\AdminPanel\PageHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\TextRequest;
use App\Services\Models\TextPageHome;
use App\Services\Models\TitlePageHome;
use Illuminate\Http\Request;

class TextPageHomeController extends Controller
{
    public function index()
    {
        $title = TitlePageHome::all();
        $textT = TextPageHome::all();

        return view('adminPanel/page/pageHome/text', compact('title', 'textT'));
    }
    public function createNewText(TextRequest $request)
    {
        TextPageHome::create($request->all());
        return redirect()->back();
    }
    public function updateTitle(Request $request)
    {
        $title = TitlePageHome::find(1);
        $title->update($request->all());
        return redirect()->back();
    }
    public function updateText(Request $request, $id)
    {
        $text = TextPageHome::find($id);
        $db = [
            'title' => $request['title'],
            'text' => $request['text']
        ];
        $text -> update($db);
        return redirect()->back();
    }
    public function deleteTitle()
    {
        $text = TitlePageHome::find(1);
        $title = [
            'title' => '',
            'text' => ''
        ];
        $text->update($title);
        return redirect()->back();
    }
    public function deleteText($id)
    {
        $text = TextPageHome::find($id);
        $text->delete();
        return redirect()->back();
    }
}
