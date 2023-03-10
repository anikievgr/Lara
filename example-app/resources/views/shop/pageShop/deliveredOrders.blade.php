@extends('../../../shop/app')
@section('name')
    Доставленное
@endsection
@section('trueOrder')
    active
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
                                    <h4>Заказы</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">

                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <form method="GET"  action="{{route('order.search')}}">
                                    @csrf

                                    <div class="form-group d-flex justify-content-around  pt-2" >

                                        <div class="input-group mb-4" style="width: 40%;">
                                            <div class="input-group-prepend" >
                                                <span class="input-group-text" id="basic-addon5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>                                                </span>
                                            </div>


                                            <input type="text" name="search" class="form-control mainInput" placeholder="" value="{{$request['search']}}"  aria-label="Username">
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
                                    <th>Продукты/описание</th>
                                    <th class="no-content">Количество</th>
                                    <th class="no-content">Цена за шт.</th>
                                    <th class="no-content">Цена за заказ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->product}}</td>
                                        <td>{{$order->quantity}} шт.</td>
                                        <td>{{$order->price}} p.</td>
                                        <td>{{$order->price * $order->quantity}} p.</td>
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


                </div>

            </div>







@endsection
