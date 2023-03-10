<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\Models\Category;
use App\Services\Models\Company;
use App\Services\Models\HeaderIncubirovane;
use App\Services\Models\Image;
use App\Services\Models\Mail;
use App\Services\Models\News;
use App\Services\Models\Order;
use App\Services\Models\Post;
use App\Services\Models\Process;
use App\Services\Models\Product;
use App\Services\Models\Slide;
use App\Services\Models\Statisic;
use App\Services\Models\TextIncubirovane;
use App\Services\Models\TextPageHome;
use App\Services\Models\TitlePageHome;
use App\Services\Models\User;
use App\Services\Models\Video;
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
        Product::factory(20)->create();
        Order::factory(20)->create();

    }
}
