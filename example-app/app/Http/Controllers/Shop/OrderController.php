<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\User\MassageOrder;
use App\Models\Order;
use App\Models\TrueOrders;
use App\Services\serch\SearchInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainOrders = Order::where('user_id', '=', auth()->id())->paginate(10);
       // dd($mainOrders);

        //dd(1);
        $request = [
            'name' => 'null',
            'search' => null,
            "dateOne" => null,
            "dateTwo" => null
        ];
        return view('shop/pageShop/order' , compact('mainOrders',  'request'));

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order-> delete();
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

        $order = Order::with('user')->find($id);
        $bd = [
            'product'=>$order['product'],
            'price'=>$order['price'],
            'quantity'=>$order['quantity'],
            'user_id'=>$order['user_id'],
            'date'=>date('Y-m-d'),

        ];
        \Illuminate\Support\Facades\Mail::to($order->user->email)->send(new MassageOrder($bd));
         TrueOrders::create($bd);
        $order->delete();
        return redirect()->back();

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
    public function search(Request $request, SearchInterface $search){
       // dd($request->all());
        $mainOrders =  $search->searchUser($request, \auth()->user()->role);
        $request = [
            'name' => array_key_first( $request->all()),
            'search' => $request[array_key_first( $request->all())],
            "dateOne" =>  $request['dateOne'],
            "dateTwo" => $request['dateTwo']
        ];

        //dd($mainOrders);
        return view('shop/pageShop/order' , compact('mainOrders', 'request'));
    }
    public function deliveredOrder(Request $request, SearchInterface $search){

        $orders =  $search->deliveredUser($request, \auth()->user()->role);
        $request = [
            'name' => array_key_first( $request->all()),
            'search' => $request[array_key_first( $request->all())],
            "dateOne" =>  $request['dateOne'],
            "dateTwo" => $request['dateTwo']
        ];

        //dd($mainOrders);
        return view('shop/pageShop/deliveredOrders' , compact('orders', 'request'));
    }
}
