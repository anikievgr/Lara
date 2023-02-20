<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        $products = Product::paginate(100);
        $users = User::all();
        //unset($users[0]);
        $UserOrders = [];
        $orders = Order::all();
        $orderTable = [];


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
        $serch['status'] = 'off';

        return view('adminPanel/page/pageForm/pagehome/product', compact('products', 'orders', 'serch'));

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
    public function search(Request $request){
        $orders = [];
        $serch = [];
        $serch['status'] = 'on';
        $chek = strpos($request['serch'], '@');
       //dd($request->all());
        if ($request->serch == null ){
            $users = User::all();
            if ($request->serchT != null) {


                foreach ($users as $user){
                        foreach ($user->orders->where('date', '>=', $request['serchO'])->where('date', '<=', $request['serchT']) as $order){
                            $orders[] = $order;
                        }
                }

            }else{
                foreach ($users as $user){
                    foreach ($user->orders->where('date', '>=', $request['serchO']) as $order){
                        $orders[] = $order;
                    }
                }
            }

        }else{
            if (($request->serchO != null) && ($request->serchT == null)){
                $request->serchT  = date('Y')+1;
                $request['serchT']  =$request->serchT .'-'.date("m-d");

            }
        if ($chek == true){

            $d = Order::where('date', '>=', $request['serchO'])->where('date', '<=', $request['serchT'])->with(['user' => function($query) use ($request){
                $query->where('email', 'like', '%'.$request['serch'].'%');
            }])->get();
            foreach($d as $dd){
                if ($dd->user != null) {
                    $id = $dd->user->id;
                }
            }

        }else{
            $chek =  preg_replace('![A-Z|А-Я]!u','-',$request['serch']);
            $chek = substr_count($chek, '-');
            //dd($request['serch']);
            if ($chek >= 2){
                $d = Order::where('date', '>=', $request['serchO'])
                    ->where('date', '<=', $request['serchT'])
                    ->with(['user' => function($query) use ($request){
                        $query->where('name', 'like', '%'.$request['serch'].'%');
                    }])
                    ->get();

                foreach($d as $dd){
                    if ($dd->user != null) {
                        $id = $dd->user->id;
                    }
                }

            }
        }
            $user = User::find($id);
            $orders = $user->orders;
        }

//dd($orders);

        $serch['serch'] =  $request->all();

        $products = [];
//dd($products);
        return view('adminPanel/page/pageForm/pagehome/product', compact('products', 'orders', 'serch'));



    }
}
