@extends('../../../shop/app')
@section('name')
    Заказы
@endsection
@section('orders')
    active
@endsection
@section('scriptAdd')
    <script src="{{asset('style/js/mainMenu.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
    @endsection
@section('headerAddLink')
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/css/mainMenu.css')}}">
@endsection
@section('content')


        <div class="layout-px-spacing">

            <div class="row layout-top-spacing" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Заказы</h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area br-6">
                        <div class="dt--top-section">

                        </div>
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <form method="GET"  action="{{route('order.search')}}">
                                @csrf
                                <div class="form-group d-flex justify-content-around  pt-2" >

                                    <div class="input-group mb-4" style="width: 40%;">
                                        <div class="input-group-prepend" >
                                                <span class="input-group-text" id="basic-addon5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                                </span>
                                        </div>
                                        <input type="text" name="product" class="form-control mainInput" placeholder="Поиск по заказу" value="{{$request['search']}}"  aria-label="Username">
                                    </div>
                                    <label for="inputDate" class="align-self-center pb-3  mr-3">C </label>
                                    <input type="date" name="dateOne" class="form-control" value="{{$request['dateOne']}}" style="width: 17%; ">
                                    <label for="inputDate" class="align-self-center  pb-3  mr-3">ДО </label>
                                    <input type="date" name="dateTwo" class="form-control" value="{{$request['dateTwo']}}" style="width: 17%; ">
                                    <button type="submit" class="log_out" style="width: 45.4px; height: 45.4px; margin-top: -0px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>

                                </div>

                            </form>
                            <thead>
                            <tr>
                                <th>Мои заказы</th>
                                <th>Количество</th>
                                <th>Цена за одну</th>
                                <th class="no-content">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mainOrders as $product)
                                <tr>
                                    <td>{{$product['product']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['price']}} рублей</td>
                                    <td><a href="" data-toggle="modal" data-target="#d{{$product['id']}} "> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="w-90">
                            @if($request['search'] == '')
                                {{$mainOrders->appends(['product' => '', 'dateOne' =>$request['dateOne'], 'dateTwo' => $request['dateTwo']])->links()}}
                            @else
                                {{$mainOrders->appends(['product' => $request['search'], 'dateOne' =>$request['dateOne'], 'dateTwo' => $request['dateTwo']])->links()}}

                            @endif
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                @foreach($mainOrders as $product)
                    <div id="d{{$product['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content p-1">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Вы точно хотите удалить заказ?</h4>
                                </div>
                                <a href="{{route('order.show',$product['id'])}}" class="btn btn-primary mb-2">Да</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>



@endsection
