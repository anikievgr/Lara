<?php

namespace App\Services\serch;

use App\Models\Order;

class Search implements SearchInterface
{

    public function serch($request, $status)
    {
        $orders = null;
        $keyArray = array_key_first( $request->all());//категория по которой мы ищем
        //dd($request->all());
        if ($status == 1){
            if (!empty($request[$keyArray])){
                if ($request['dateOne'] == null && $request['dateTwo'] == null){



                    switch ($keyArray){

                        case 'product':  //по продукту

                            $orders =  Order::where($keyArray, 'like', $request[$keyArray])
                                ->paginate(10);
                            break;

                        default: //по почте или имени

                            $orders =  Order::with(['user' => function($query) use ($keyArray, $request){
                                $query->where($keyArray, 'like', $request[$keyArray]);
                            }])
                                ->paginate(10);
                            break;
                    }
                    //нет дат
                }elseif ($request['dateOne'] != null && $request['dateTwo'] != null){
                    switch ($keyArray){

                        case 'product':  //по продукту
                            $orders =  Order::where('date', '>=', $request['dateOne'])
                                ->where('date', '<=', $request['dateTwo'])
                                ->where($keyArray, 'like', $request[$keyArray])
                                ->paginate(10);
                            break;

                            default: //по почте или имени

                                $orders =  Order::where('date', '>=', $request['dateOne'])
                                    ->where('date', '<=', $request['dateTwo'])
                                    ->with(['user' => function($query) use ($keyArray, $request){
                                        $query->where($keyArray, 'like', '%'.$request[$keyArray].'%');
                                    }])
                                    ->paginate(10);
                            break;
                    }
                   //если есть обе даты
                }elseif ($request['dateOne'] != null && $request['dateTwo'] == null){
                    switch ($keyArray){

                        case 'product':  //по продукту
                            $orders =  Order::where('date', '>=', $request['dateOne'])
                                ->where('date', '<=', date('Y-m-d'))
                                ->where($keyArray, 'like', $request[$keyArray])
                                ->paginate(10);
                            break;

                        default: //по почте или имени

                            $orders =  Order::where('date', '>=', $request['dateOne'])
                                ->where('date', '<=', date('Y-m-d'))
                                ->with(['user' => function($query) use ($keyArray, $request){
                                    $query->where($keyArray, 'like', '%'.$request[$keyArray].'%');
                                }])
                                ->paginate(10);
                            break;
                    }
                    //если нет 2ой даты
                }elseif ($request['dateOne'] == null && $request['dateTwo'] != null){
                    switch ($keyArray){

                        case 'product':  //по продукту
                            $orders =  Order::where('date', '<=', $request['dateTwo'])
                                ->where($keyArray, 'like', $request[$keyArray])
                                ->paginate(10);
                            break;

                        default: //по почте или имени

                            $orders =  Order::where('date', '<=', $request['dateTwo'])
                                ->with(['user' => function($query) use ($keyArray, $request){
                                    $query->where($keyArray, 'like', '%'.$request[$keyArray].'%');
                                }])
                                ->paginate(10);
                            break;
                    }
                    //если нет первой даты, есть категория
                }
                //есть категория
            }elseif(empty($request[$keyArray])){

                if ($request['dateOne'] != null && $request['dateTwo'] != null){
                    $orders =  Order::where('date', '>=', $request['dateOne'])
                                ->where('date', '<=', $request['dateTwo'])
                                ->paginate(10);
                    //если есть обе даты
                }elseif ($request['dateOne'] != null && $request['dateTwo'] == null){
                    $orders =  Order::where('date', '>=', $request['dateOne'])
                                ->where('date', '<=', date('Y-m-d'))
                                ->paginate(10);

                    //если нет 2ой даты
                }elseif ($request['dateOne'] == null && $request['dateTwo'] != null){
                    $orders =  Order::where('date', '<=', $request['dateTwo'])
                        ->paginate(10);

                    //если нет первой даты
                }
                //нет категории

            }
        }


        return $orders;
    }
}
