<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TrueOrders;
use App\Models\User;
use App\Services\serch\SearchInterface;
use Illuminate\Http\Request;

class TruemainOrderController extends Controller
{
    public function index(){
        $products = Product::paginate(10, ['*'], 'product');
        $users = User::all();
        //unset($users[0]);
        $UserOrders = [];
        $orders = TrueOrders::with('user')->join( 'users','users.id', '=', 'true_orders.user_id', )
            ->select('true_orders.id as orderID', 'true_orders.product', 'true_orders.quantity','true_orders.price','true_orders.date', 'users.name','users.email')
            ->paginate(10, ['*'], 'orders');
    //dd($orders);

        $request = [
            'name' => 'null',
            'search' => null,
            "dateOne" => null,
            "dateTwo" => null
        ];

        return view('adminPanel/page/deliveredOrders', compact('products', 'orders', 'request'));
    }

        public function search(Request $request, SearchInterface $search){

            $orders =  $search->delivered($request, \auth()->user()->role);
            $products = Product::paginate(10, ['*'], 'order');
            $request = [
                'name' => array_key_first( $request->all()),
                'search' => $request[array_key_first( $request->all())],
                "dateOne" =>  $request['dateFirst'],
                "dateTwo" => $request['dateSecond']
            ];

            return view('adminPanel/page/deliveredOrders', compact( 'orders', 'products', 'request'));
    }
}
