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
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function pageHome(){

        $gImage = Image::all();
          if ($gImage[0]['title'] == '') {
            $gImage = [];
        }

        $video = Video::all();
          if ($video[0]['title'] == '') {
            $video = [];
        }
         $textBox = TextPageHome::all();
        if ($textBox->count() == 0) {
            $textBox = [];
        }
        $titleText = TitlePageHome::all();
        if ($titleText[0]['title'] == '') {
            $titleText = [];
        }
        $procent = Statisic::all();
        $process = Process::all();
        $processSort = [];
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
        //dd($processSort);
        $ocompany = Company::find(1);

        if($ocompany['title'] == ''){
            $ocompany['title'] = 0;
        }
        if ($procent->count() == 0) {
            $procent = [];
        }
        $items = Slide::all();
           $img =[];
           $i = 0;
        $news = News::all();
        if ($news->count() == 0) {
            $news = [];
        } else {
            foreach ($news as $key => $lrNews) {
            if($i == 1){
                    $news[$key]['lr'] = 'right';
                    $i = 0;

            }else{
               $news[$key]['lr'] = ' ';
                 $i++;
            }

            }

            //  $news = $news->chunk(2);
             // dd($news);
        }

        $gallerea = array();
          $catygories = Category::all();
           $it = $catygories;
             //dd($gallerea);
        if ($catygories->count() == 0) {
            $gallerea = [];
            $it = [];
            //dd($gallerea);
        }else{

        foreach ($catygories as $key => $catygories){

            foreach($catygories->posts as $key=> $image){

                $img[$image['id']] = $image['image'];
            }

            $gallerea[$catygories['title']]['id'] = $catygories['id'];
            $gallerea[$catygories['title']]['id'] = $catygories['id'];
            $gallerea[$catygories['title']]['image'] = $img;
            $img = [];
        }

    //dd($gallerea);
    }
        return view('userPage/page/pageHome',compact('video', 'items', 'gallerea','news', 'procent', 'ocompany', 'processSort', 'titleText', 'textBox', 'gImage' ));
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
    //администраторская панель
    public function loginToTheAdminPanel()
    {
        return view('adminPanel/page/loginTo');
    }
    public function adminPanel()
    {
        return view('adminPanel/page/adminPanel');
    }

    public function adminSales()
    {
        return view('adminPanel/page/sales');
    }
     public function adminChat()
    {
        return view('adminPanel/page/chat');
    }
    public function adminMail()
    {
        return view('adminPanel/page/mail');
    }
     public function adminSlider()
    {
        return view('adminPanel/page/pageForm/pageHome/pageHomeForm');
    }
         public function adminIncubirovane()
    {
        return view('adminPanel/page/pageForm/pageHome/incubirovanieFrom');
    }
           public function adminContact()
    {
        return view('adminPanel/page/pageForm/pageHome/ContactFrom');
    }
}
