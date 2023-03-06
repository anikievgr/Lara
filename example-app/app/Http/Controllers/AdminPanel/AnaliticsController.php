<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnaliticsController extends Controller
{
    public function index()
    {
        return view('adminPanel/page/adminPanel');
    }



}
