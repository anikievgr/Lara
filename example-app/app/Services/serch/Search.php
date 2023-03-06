<?php

namespace App\Services\serch;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Search implements SearchInterface
{

    public function serch($request, $status)
    {
        //dd($request->all());
        $orders = DB::table('orders')
            ->join('users', function (JoinClause $join) use ($request) {
                $join->on('orders.user_id', '=', 'users.id');
            })
            ->orWhere('product', 'Like', '%'.$request['search'] .'%')
            ->orWhere('name', 'like', '%'.$request['search'].'%')
            ->orWhere('email', 'like', '%'.$request['search'].'%')
            ->where(
                [
                    ['date', '>=', $request['dateFirst']],
                    ['date', '<=', $request['dateSecond']],
                ]
            )
            ->paginate(100);


        return $orders;
    }
}
