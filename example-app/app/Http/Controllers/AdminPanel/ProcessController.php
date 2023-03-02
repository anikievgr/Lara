<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = Process::all();

        if($process->count()  == 0){
            $processSort = [];
        }
        foreach ($process as $sort) {
            $color = explode(",", $sort['color']);
            $color =    sprintf("#%02x%02x%02x", $color[0], $color[1], $color[2]);
            $processSort[$sort['nomerprocess']] = [
                        'id' => $sort['id'],
                        'nameprocess' => $sort['nameprocess'],
                        'color' => $color

            ];

        }
        ksort($processSort);





              return view('adminPanel/page/pageForm/pagehome/procaess', compact('processSort'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $color = sscanf($request['color'], "#%02x%02x%02x");
        $color['color'] = sprintf("#%02x%02x%02x", $color[0], $color[1],$color[2]);

        $request = [
            'nameprocess' => $request['nameprocess'],
            'nomerprocess' => $request['nomerprocess'],
            'color' => "$color[0], $color[1],$color[2], .8"
        ];
        Process::create($request);
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
       // dd($id);
         $items = Process::query()->find($id);
         $items->delete();
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
        $item = Process::find($id);
        $color = sscanf($request['color'], "#%02x%02x%02x");

        $request = [

            'nameprocess' => $request['nameprocess'],
            'nomerprocess' => $request['nomerprocess'],
            'color' => "$color[0], $color[1],$color[2], .8"
        ];
        //dd($request);
        $item->update($request);
        return redirect()->back();
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
