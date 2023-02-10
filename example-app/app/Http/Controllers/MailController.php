<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail = Mail::all();
        if ($mail->count() == 0) {
            $mail = [];
        }


       return view('adminPanel/page/pageForm/pageMail/mail', compact('mail'));
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
       //
        if ($request['theme'] == 'Sales'){
            $request['theme'] = 'Сотрудничество';
        }else{
            $request['theme'] = 'Поддежка';
        }

        $item = [
            'name' => $request['name'],
            'mail' => $request['mail'],
            'telephone' => $request['telephone'],
            'theme' => $request['theme'],
            'text' => $request['text']
        ];
        //dd($item);
        Mail::create($item);
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if($id == 'all'){
            Mail::truncate();
            return redirect('mail');
        }
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
