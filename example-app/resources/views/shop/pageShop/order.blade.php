@extends('../../../shop/app')
@section('orders')
    active
@endsection
@section('scriptAdd')

    <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
    @endsection
@section('headerAddLink')
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/dt-global_style.css')}}">

@endsection
@section('content')
    @if( $serch['status'] != 'on')
    <div id="content" class="main-content">
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
                            <form method="post" action="{{route('order.search')}}">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-sm-3 my-1">
                                        <input type="text" name="serch" class="form-control " id="inlineFormInputName"  value={{$serch['serch']['serch']}}>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <input type="text" name="serchO" class="form-control " id="inlineFormInputName" placeholder="Год-Месяц-День"  value={{$serch['serch']['serchO']}}>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <input type="text" name="serchT" class="form-control " id="inlineFormInputName" placeholder="Год-Месяц-День"  value={{$serch['serch']['serchT']}}>
                                    </div>
                                    <div class="col-auto my-1">
                                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
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

    </div>
    @else
        <div id="content" class="main-content">
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
                            <div class="dt--top-section ">
                                <form method="post" action="{{route('order.search')}}">
                                    @csrf
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3 my-1">
                                            <input type="text" name="serch" class="form-control " id="inlineFormInputName" value={{$serch['serch']['serch']}}>
                                        </div>
                                        <div class="col-sm-3 my-1">
                                            <input type="text" name="serchO" class="form-control " id="inlineFormInputName" placeholder="Год-Месяц-День"  value={{$serch['serch']['serchO']}}>
                                        </div>
                                        <div class="col-sm-3 my-1">
                                            <input type="text" name="serchT" class="form-control " id="inlineFormInputName" placeholder="Год-Месяц-День"  value={{$serch['serch']['serchT']}}>
                                        </div>


                                    </div>
                                </form>

                            </div>
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Мои заказы</th>
                                    <th>Количество</th>
                                    <th>Цена за одну</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mainOrders as $product)
                                    <tr>
                                        <td>{{$product['product']}}</td>
                                        <td>{{$product['quantity']}}</td>
                                        <td>{{$product['price']}} рублей</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>
                    <!-- Button trigger modal -->



                </div>

            </div>

        </div>
    @endif
@endsection
