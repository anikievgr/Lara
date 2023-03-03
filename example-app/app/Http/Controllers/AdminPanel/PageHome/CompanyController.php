<?php

namespace App\Http\Controllers\AdminPanel\PageHome;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Statisic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(){

        $statistic = Statisic::all();
        $company = Company::all();
        return view('adminPanel/page/pageHome/company', compact('statistic', 'company'));
    }
    public function updateСoverage(Request $request){
        $stattisticFirst = Statisic::find(1);
        $stattisticFirst->update($request->all());

        $statistic = Statisic::find(2);
        $statisticSecond = 100 - $request['procent'];
        $statisticSecond = ['procent' => $statisticSecond];
        $statistic->update($statisticSecond);
        return redirect()->back();
    }
    public function update(Request $request){

        $path = null;
        $companyText= Company::find('1');
        Storage::disk('public')->delete($companyText['image']);
        $path = $request->file('image')->store('uploads', 'public');
        $request =[
            'image' =>$path,
            'title' =>$request['title'],
            'text' =>$request['text'],
        ];
        $companyText->update($request);
        return redirect()->back();
    }
}
