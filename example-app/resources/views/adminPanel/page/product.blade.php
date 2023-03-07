@extends('../../../adminPanel/app')
@section('product')  <li class='menu active' > @endsection
    @section('name')
        Продукты
    @endsection
@section('scriptAdd')
        <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
    @endsection
@section('headerAddLink')
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/dt-global_style.css')}}">
        <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css" ')}}"  rel="stylesheet" type="text/css" />
        <link href="{{asset('style/pageAdmin/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')




            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Товары</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">

                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Продукты/описание</th>
                                    <th>Цена</th>
                                    <th class="no-content">Редактирование</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product['product']}}</td>
                                    @if($product['price'] <= 1)
                                    <td>{{$product['price']}} рубль</td>
                                    @elseif($product['price'] > 1 && $product['price']<5)
                                        <td>{{$product['price']}} рубля</td>
                                    @else
                                        <td>{{$product['price']}} рублей</td>
                                    @endif
                                    <td><a href="" data-toggle="modal" data-target="#d{{$product['id']}} "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between p-2">
                                <div class="w-90">
                                    {{$products->links()}}
                                </div>
                                <div>
                                    <button class="btn btn-primary ml-3 mb-3" data-toggle="modal" data-target="#add" >Добавить</button>
                                    <button class="btn btn-primary ml-3 mb-3" data-toggle="modal" data-target="#deletAll" >Удалить все товары</button>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Заказы</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">

                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <form method="GET"  action="{{route('orderA.search')}}">
                                    @csrf

                                    <div class="form-group d-flex justify-content-around  pt-2" >

                                        <div class="input-group mb-4" style="width: 40%;">
                                            <div class="input-group-prepend" >
                                                <span class="input-group-text" id="basic-addon5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>                                                </span>
                                            </div>


                                            <input type="text" name="search" class="form-control mainInput" placeholder="Выберите категорию" value="{{$request['search']}}"  aria-label="Username">
                                        </div>

                                        <label for="inputDate" class="align-self-center pb-3  mr-3">C </label>
                                        <input type="date" name="dateFirst" class="form-control" value="{{$request['dateOne']}}" style="width: 17%; ">
                                        <label for="inputDate" class="align-self-center  pb-3  mr-3">ДО </label>
                                        <input type="date" name="dateSecond" class="form-control" value="{{$request['dateTwo']}}" style="width: 17%; ">
                                        <button type="submit" class="log_out" style="width: 45.4px; height: 45.4px; margin-top: -0px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </button>

                                    </div>

                                </form>
                                <thead>
                                <tr>
                                    <th>Заказчик</th>
                                    <th>Почта заказчика</th>
                                    <th>Продукты/описание</th>
                                    <th class="no-content">Количество</th>
                                    <th class="no-content">Завершить заказ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)



                                    <tr>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{ $order->product}}</td>
                                        <td>{{$order->quantity}} шт.</td>
                                        <td>
                                            <a href="{{route('order.edit',$order->id)}}" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-fast-forward"><polygon points="13 19 22 12 13 5 13 19"></polygon><polygon points="2 19 11 12 2 5 2 19"></polygon></svg></a>
                                        </td>

                                    </tr>

                                @endforeach





                                </tbody>
                            </table>
                            <div class="w-90">
                                @if($request['search'] == '')
                                    {{$orders->appends(['product' => '', 'dateOne' =>$request['dateOne'], 'dateTwo' => $request['dateTwo']])->links()}}
                                @else
                                    {{$orders->appends([$request['name'] => $request['search'], 'dateOne' =>$request['dateOne'], 'dateTwo' => $request['dateTwo']])->links()}}

                                @endif
                            </div>
                           </div>

                    </div>

                    <!-- Button trigger modal -->
                    <div id="deletAll" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content p-1">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Вы точно хотите удалить все товары?</h4>
                                </div>
                                <a href="{{route('tableproducts.show', 'all')}}" class="btn btn-primary mb-2">Да</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade login-modal" id="add" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header" id="loginModalLabel">
                                    <h4 class="modal-title">Редактирование</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="{{route('tableproducts.store')}}" class="mt-0">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input name="product"  class="form-control mb-4" id="exampleInputPassword1" placeholder="Товар">
                                            </div>
                                            <label>Цена</label>
                                            <input name="price" class="form-control mb-2" id="exampleInputEmail1" placeholder="Цена за штуку">
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Добавить</button>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Modal -->
                    @foreach($products as $product)

                    <div class="modal fade login-modal" id="d{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header" id="loginModalLabel">
                                    <h4 class="modal-title">Редактирование</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="{{route('tableproducts.update', $product['id'])}}" class="mt-0">
                                        {{ csrf_field() }}
                                        @method('PATCH ')
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input name="product"  class="form-control mb-4" id="exampleInputPassword1" value="{{$product['product']}}">
                                            </div>
                                            <label>Цена</label>
                                            <input name="price" class="form-control mb-2" id="exampleInputEmail1" value="{{$product['price']}}">
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Изменить</button>
                                        <p > Удалить</p>
                                        <div class="action-btn m-auto" style="width: 24px;" data-toggle="modal" data-target="#f{{$product['id']}}">

                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>

                                        </div>
                                    </form>






                                </div>

                            </div>
                        </div>
                    </div>
                        <div id="f{{$product['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content p-1">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Вы точно хотите удалить товар?</h4>
                                    </div>
                                    <a href="{{route('tableproducts.show', $product['id'])}}" class="btn btn-primary mb-2">Да</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>







@endsection
