<?php

namespace App\Http\Controllers;
use App\Services\Models\Category;
use App\Services\Models\Company;
use App\Services\Models\HeaderIncubirovane;
use App\Services\Models\Image;
use App\Services\Models\News;
use App\Services\Models\Process;
use App\Services\Models\Slide;
use App\Services\Models\Statisic;
use App\Services\Models\TextIncubirovane;
use App\Services\Models\TextPageHome;
use App\Services\Models\TitlePageHome;
use App\Services\Models\Video;

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
          if ($title[0]['image'] == '') {
            $title = [];
        }
        return view('userPage/page/incubirovanie', compact('title', 'text'));
    }
     // администраторская панель



}
