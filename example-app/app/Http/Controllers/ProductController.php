<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\serch\Search;
use App\Services\serch\SearchInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10, ['*'], 'product');
        $users = User::all();
        //unset($users[0]);
        $UserOrders = [];
        $orders = Order::with('user')->paginate(10, ['*'], 'order');

        $orderTable = [];




        $request = [
           'name' => 'null',
            'search' => null,
          "dateOne" => null,
          "dateTwo" => null
        ];

        return view('adminPanel/page/pageForm/pagehome/product', compact('products', 'orders', 'request'));

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
    public function search(Request $request, SearchInterface $search){

       $orders =  $search->serch($request, \auth()->user()->role);
        $products = Product::paginate(10, ['*'], 'order');
        $request = [
            'name' => array_key_first( $request->all()),
            'search' => $request[array_key_first( $request->all())],
            "dateOne" =>  $request['dateOne'],
            "dateTwo" => $request['dateTwo']
        ];
//dd($request->all());
        return view('adminPanel/page/pageForm/pagehome/product', compact( 'orders', 'products', 'request'));
    }
}
