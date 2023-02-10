<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\HeaderIncubirovane;
use App\Models\Image;
use App\Models\Mail;
use App\Models\News;
use App\Models\Post;
use App\Models\Process;
use App\Models\Slide;
use App\Models\Statisic;
use App\Models\TextIncubirovane;
use App\Models\TextPageHome;
use App\Models\TitlePageHome;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Slide::factory(5)->create();
      Video::factory(1)->create();
        TitlePageHome::factory(1)->create();
        TextPageHome::factory(3)->create();
        TextIncubirovane::factory(2)->create();
        Statisic::factory(2)->create();
        Process::factory(4)->create();
        News::factory(4)->create();
        Mail::factory(10)->create();
        Image::factory(1)->create();
        HeaderIncubirovane::factory(1)->create();
        Company::factory(1)->create();
        Category::factory(4)->create();
        Post::factory(7)->create();
        User::factory(1)->create();

    }
}
