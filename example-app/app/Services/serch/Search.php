<?php

namespace App\Services\serch;

use App\Models\Order;
use App\Models\User;
use Cassandra\Cluster\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Search implements SearchInterface
{

    public function serch($request, $status)
    {

        $orders = DB::table('orders')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('orders.user_id', '=', 'users.id');
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

        //dd($orders,$request->all());
        return $orders;
    }
}
