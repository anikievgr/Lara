<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\serch\SearchInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')
            ->join( 'users','users.id', '=', 'orders.user_id', )
            ->select(
                'orders.id as orderID',
                'orders.product',
                'orders.quantity',
                'orders.status',
                'orders.price',
                'orders.date',
                'users.name',
                'users.email')
            ->paginate(10, ['*'], 'order');

        $orderLim = DB::table('orders')->skip(0)->take(4)->get();
        $request = [
            'name' => 'null',
            'search' => null,
            "dateOne" => null,
            "dateTwo" => null,
            "delivered" => 'on',
            "notDelivered" =>  'on',
        ];
        return view('adminPanel/page/orders', compact( 'orders', 'request', 'orderLim'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

        $order = Order::find($id);
        $order->update([
            "status" => $request['select']
        ]);
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

    }
    public function search(Request $request, SearchInterface $search){
        $orders =  $search->search($request, \auth()->user()->role);
        $request = [
            'name' => array_key_first( $request->all()),
            'search' => $request[array_key_first( $request->all())],
            "dateOne" =>  $request['dateFirst'],
            "delivered" => $request['delivered'],
            "notDelivered" =>  $request['notDelivered'],
        ];

        return view('adminPanel/page/orders', compact( 'orders',  'request'));
    }

}
