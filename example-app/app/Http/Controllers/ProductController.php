<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $users = User::all();
        unset($users[0]);

        $orders = Order::all();
        $orderTable = [];

//        foreach ($users as $key => $user){
//
//
//                foreach ($user->orders as $key =>$order){
//                    $orderTable[$key]['id'] = $order['id'];
//                    $orderTable[$key]['product'] = $order['product'];
//                    $orderTable[$key]['quantity'] = $order['quantity'];
//                    $orderTable[$key]['date_create'] = $order['created_at'];
//                }
//            $orders[$key]['name'] = $user['name'];
//            $orders[$key]['email'] = $user['email'];
//            $orders[$key]['orders'] = $orderTable;
//
//            $orderTable =[];
//        }
        $f = [];
//        foreach ($users as  $key =>$user){
//
//            foreach ($user->orders as $order){
//                $orders[$key]['name']= $user['name'];
//                $orders[$key]['email']= $user['email'];
//                $orders[$key]['orderID']= $order['id'];
//                $orders[$key]['product']= $order['product'];
//                $orders[$key]['quantity']= $order['product'];
//
//            }
//            dd($orders);
//            $f = $orders;
//
//        }
        foreach ($users as $key => $user){

            foreach($user->orders as $key=> $order){
                $UserOrders[] = $order;
            }
            $orderTable[] =[
                'name' => $user['name'],
                'email' => $user['email'],
                'order' =>$UserOrders ,

            ];

            $UserOrders = [];
        }
        $orders = $orderTable;

        return view('adminPanel/page/pageForm/pagehome/product', compact('products', 'orders'));

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
        Product::create($request->all());
        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 'all') {
            Product::query()->delete();
        } else {
            $product = Product::find($id);
            $product->delete();

        }
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
        $product = Product::find($id);
        $product->update($request->all());
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
}
