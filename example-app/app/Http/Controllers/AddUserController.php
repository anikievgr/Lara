<?php

namespace App\Http\Controllers;

use App\Mail\User\Massage;
use App\Models\Mail;
use App\Models\News;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddUserController extends Controller
{
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
        $id = $request['id'];
        $userAdd = Mail::find($id);

        $numAlpha = 4; $numDigit = 2; $numNonAlpha = 2;
        $listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $listDigits = '0123456789';
        $listNonAlpha = ',;:!?.$/*-+&@_+;./*&?$-!,';
        $password  = str_shuffle(
            substr(str_shuffle($listAlpha), 0, $numAlpha) .
            substr(str_shuffle($listDigits), 0, $numDigit) .
            substr(str_shuffle($listNonAlpha), 0, $numNonAlpha)
        );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
     $userAdd = Mail::find($id);

        $password= 551151;
        $user = User::create([
            'name' =>  $userAdd['name'],
            'email' =>  $userAdd['mail'],
            'password' => Hash::make($password),

        ]);

        $userAdd->delete();

        //\Illuminate\Support\Facades\Mail::to($user['email'])->send(new Massage($password));


        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
