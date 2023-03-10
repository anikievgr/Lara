<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Company;
use App\Models\HeaderIncubirovane;
use App\Models\Image;
use App\Models\News;
use App\Models\Process;
use App\Models\Slide;
use App\Models\Statisic;
use App\Models\TextIncubirovane;
use App\Models\TextPageHome;
use App\Models\TitlePageHome;
use App\Models\Video;

class MainController extends Controller
{
    public function pageHome(){
        $processSort = [];
        $slides = Slide::all();
        $textBox = TextPageHome::all();
        $titleText = TitlePageHome::all();
        $gImage = Image::all();
        $gallerea = Category::with('posts')->get();
        $video = Video::all();
        $ocompany = Company::all();
        $procent = Statisic::all();
        $process = Process::all();

        if ($process->count() == 0) {
            $processSort = [];
        } else {
            foreach ($process as $sort) {
                $processSort[$sort['nomerprocess']] = [
                    'nameprocess' => $sort['nameprocess'],
                    'color' => $sort['color']
                ];
            }
            ksort($processSort);
        }
        $news = News::all();
        return view('userPage/page/pageHome',compact('video', 'slides', 'gallerea','news', 'procent', 'ocompany', 'processSort', 'titleText', 'textBox', 'gImage' ));
    }
    public function contacti(){
        return view('userPage/page/contact');
    }
    public function incubirovanie(){
        $title = HeaderIncubirovane::all();
        $text = TextIncubirovane::all();
        return view('userPage/page/incubirovanie', compact('title', 'text'));
    }
     // администраторская панель



}
