<?php

namespace App\Services\serch;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Search implements SearchInterface
{

    public function search($request, $status)
    {

        $orders = DB::table('orders')
            ->select('orders.id as orderID', 'orders.product','orders.status', 'orders.quantity','orders.price','orders.date', 'users.name','users.email')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('orders.user_id', '=', 'users.id');
            })
            ->when($request['delivered'] == 'on', function ($query) use ($request) {
                return $query->orWhere('status',  'Like', $request['delivered']);
            })
            ->when($request['notDelivered'] == 'off', function ($query) use ($request) {
                return $query->orWhere('status', 'Like', $request['notDelivered']);
            })
            ->when($request['search'] != null, function ($query) use ($request) {
                return $query
                    ->where(function ($q) use ($request) {
                        $q->where('product', 'Like', '%'.$request['search'] .'%')
                            ->orWhere('name', 'Like', '%'.$request['search'] .'%')
                            ->orWhere('email', 'Like', '%'.$request['search'] .'%');


                    });

            })
            ->when($request['dateFirst'] != null, function ($query) use ($request) {
                return $query->where('date', '>=', $request['dateFirst']);
            })
            ->when($request['dateSecond'] != null, function ($query) use ($request) {
                return $query->where('date', '<=', $request['dateSecond']);
            })

            ->paginate(10);

//        dd($orders,$request->all());
        return $orders;
    }
    public function searchUser($request, $status)
    {
        $orders = DB::table('orders')
            ->select('orders.id as orderID', 'orders.product', 'orders.quantity','orders.price','orders.date', 'users.name','users.email')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('orders.user_id', '=', 'users.id');
            })
            ->where('users.id', '=', auth()->id())
            ->when($request['search'] != null, function ($query) use ($request) {
                return $query
                    ->where(function ($q) use ($request) {
                        $q->where('product', 'Like', '%'.$request['search'] .'%');
                    });
            })
            ->when($request['dateFirst'] != null, function ($query) use ($request) {
                return $query->where('date', '>=', $request['dateFirst']);
            })
            ->when($request['dateSecond'] != null, function ($query) use ($request) {
                return $query->where('date', '<=', $request['dateSecond']);
            })
            ->paginate(10);

            //dd($orders,$request->all());
        return $orders;
    }
    public function delivered($request, $status)
    {
        $orders = DB::table('true_orders')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('true_orders.user_id', '=', 'users.id');
            })
            ->where($request['search'] != null, function ($query) use ($request) {
                return $query
                    ->where(function ($q) use ($request) {
                        $q->where('product', 'Like', '%'.$request['search'] .'%')
                            ->orWhere('name', 'Like', '%'.$request['search'] .'%')
                            ->orWhere('email', 'Like', '%'.$request['search'] .'%');
                    });

            })
            ->when($request['dateFirst'] != null, function ($query) use ($request) {
                return $query->where('date', '>=', $request['dateFirst']);
            })
            ->when($request['dateSecond'] != null, function ($query) use ($request) {
                return $query->where('date', '<=', $request['dateSecond']);
            })
            ->paginate(10);

        //dd($orders,$request->all());
        return $orders;
    }
    public function deliveredUser($request, $status)
    {
        $orders = DB::table('true_orders')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('true_orders.user_id', '=', 'users.id');
            })
            ->where('users.id', '=', auth()->id())
            ->when($request['search'] != null, function ($query) use ($request) {
                return $query
                    ->where(function ($q) use ($request) {
                        $q->where('product', 'Like', '%'.$request['search'] .'%');
                    });

            })
            ->when($request['dateFirst'] != null, function ($query) use ($request) {
                return $query->where('date', '>=', $request['dateFirst']);
            })
            ->when($request['dateSecond'] != null, function ($query) use ($request) {
                return $query->where('date', '<=', $request['dateSecond']);
            })
            ->paginate(10);
        return $orders;
    }

}
