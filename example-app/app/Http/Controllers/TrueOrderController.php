<?php

namespace App\Http\Controllers;

use App\Mail\User\Massage;
use App\Mail\User\MassageOrder;
use App\Models\Mail;
use App\Models\Order;
use App\Models\TrueOrders;
use App\Models\User;
use Illuminate\Http\Request;

class TrueOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $mainOrders = $user->trueOrders;
        $order = TrueOrders::all();
        if (count($mainOrders)>= 10){
            $delete = $mainOrders[9];
            $order->delete($delete['id']);

        }
        $mainOrders = $user->trueOrders;
        return view('shop/pageShop/trueorder' , compact('mainOrders'));

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
        $order = Order::find($id);
        $user = User::find($order['user_id']);
        //dd($user);
        $bd = [
            'product'=>$order['product'],
            'price'=>$order['price'],
            'quantity'=>$order['quantity'],
            'user_id'=>$order['user_id'],

        ];
        //dd($bd);
         $order->update($bd);
         TrueOrders::create($bd);
        $order->delete();
        \Illuminate\Support\Facades\Mail::to($user['email'])->send(new MassageOrder($bd));

        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *Too few arguments to function App\Http\Controllers\ProductController::search(), 2 passed in /var/www/html/vendor/laravel/framework/src/Illuminate/Routing/Controller.php on line 54 and exactly 3 expected
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
}
