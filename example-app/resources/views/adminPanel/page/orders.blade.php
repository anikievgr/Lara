@extends('../../../adminPanel/app')
@section('orders')  <li class='menu active' > @endsection
    @section('name')
        Заказы
    @endsection
@section('scriptAdd')
        <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous">
        <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('style/pageAdmin/plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('style/pageAdmin/plugins/select2/custom-select2.js')}}"></script>


        <script>


            var foodSelect = new CustomSelect({
                elem: document.getElementById('food-select')
            });

            document.addEventListener('select', function(event) {
                document.getElementById('result').innerHTML = event.detail.value;
            });
        </script>
    @endsection
@section('headerAddLink')
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/dt-global_style.css')}}">
        <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css" ')}}"  rel="stylesheet" type="text/css" />
        <link href="{{asset('style/pageAdmin/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/select2/select2.min.css')}}">

    @endsection
@section('content')
        <style>
            .customselect {
                width: 100%;
                font-size: 14px;
                display: inline-block;
            }

            .customselect .title {
                height: 20px;
                background: white;
                width: 100%;
                box-sizing: border-box;
                padding: 2px;
                line-height: 14px;
                cursor: pointer;
                text-align: left;
            }

            .customselect li {
                padding: 2px;
                cursor: pointer;
            }

            .customselect li:nth-child(even) {
                background-color: #f0f8ff;
            }

            .customselect li:hover {
                background-color: rgba(134, 134, 134, 0.6);
            }

            .customselect ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: none;
                position: absolute;
                z-index: 1000;
                background: white;
                width: 100%;

                box-sizing: border-box;
            }

            .customselect.open ul {
                display: block;
                max-height: 75px;
                overflow: auto;
            }
        </style>
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
                                <form method="GET"  action="{{route('ordersA.search')}}">

                                    @csrf

                                    <div class="form-group d-flex justify-content-around  flex-wrap pt-2" >

                                        <div class="input-group mb-4" style="width: 40%;">
                                            <div class="input-group-prepend" >
                                                <span class="input-group-text" id="basic-addon5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>                                                </span>
                                            </div>
                                            <input type="text" id="search" name="search" class="form-control mainInput" placeholder="Введите запрос" value="{{$request['search']}}"  aria-label="Username">
                                        </div>

                                        <label for="inputDate" class="align-self-center pb-3  mr-3">C </label>
                                        <input type="date" id="dateFirst"  name="dateFirst" class="form-control" value="{{$request['dateOne']}}" style="width: 17%; ">
                                        <label for="inputDate"  class="align-self-center  pb-3  mr-3">ДО </label>
                                        <input type="date" id="dateSecond" name="dateSecond" class="form-control" value="{{$request['dateTwo']}}" style="width: 17%; ">
                                        <button type="submit" class="log_out" style="width: 45.4px; height: 45.4px; margin-top: -0px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </button>

                                    </div>
                                    <div class="pl-4" >
                                        <div class="form-check">
                                            <input class="form-check-input" name="delivered" type="checkbox" value="on" id="flexCheckDefault" @if($request['delivered'] != null )checked @endif >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Доставленные
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="notDelivered" type="checkbox" value="off" id="flexCheckChecked" @if($request['notDelivered'] != null )checked @endif >
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Не доставленные
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <thead>
                                <tr>
                                    <th>Заказчик</th>
                                    <th>Почта заказчика</th>
                                    <th>Продукты/описание</th>
                                    <th class="no-content">Количество</th>
                                    <th class="no-content">Цена за весь заказ</th>
                                    <th class="no-content">Статус</th>
                                    <th class="no-content">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)



                                    <tr>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{ $order->product}}</td>
                                        <td>{{$order->quantity}} шт.</td>
                                        <td>{{$order->quantity * $order->price}} p.</td>
                                        @if($order->status == 'on' )
                                            <td class="" >Доставлнен </td>
                                            <td> <button class="btn btn-info"  data-toggle="modal" data-target="#h{{$order->orderID}}"  >Изменить статус</button></td>
                                        @else
                                            <td>Не доставлнен </td>
                                            <td>
                                                <button class="btn btn-info"  data-toggle="modal" data-target="#h{{$order->orderID}}"  >Изменить статус</button>
                                            </td>
                                        @endif

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

                    @foreach ($orders as $order)
                        <div class="modal fade" id="h{{$order->orderID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="POST" action="{{route('orders.update', $order->orderID)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Изменить статус</h5>

                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div id="select_menu" class="form-group mb-4">
                                                        <select class="custom-select " id="select" name="select" required>
                                                            @if($order->status == 'on')
                                                                <option selected value="on">Доставленно</option>
                                                                <option  value="off">Не доставленно</option>
                                                            @else
                                                                <option  value="on">Доставленно</option>
                                                                <option selected value="off">Не доставленно</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                                Нет
                                            </button>
                                            <button class = 'btn btn-primary' type="submit" >
                                                Изменить
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endforeach
                    <div id="food-select" class="customselect">
                        <button class="title">Выберите</button>
                        <ul id="ul-select">
                            @foreach($orderLim as $order)
                            <li data-value="carnivore">{{$order->product}}</li>
                            @endforeach

                        </ul>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </div>



<script>
    function CustomSelect(options) {
        var elem = options.elem;

        elem.onclick = function(event) {
            if (event.target.className == 'title') {
                toggle();
            } else if (event.target.tagName == 'LI') {
                setValue(event.target.innerHTML, event.target.dataset.value);
                close();
            }
        }

        var isOpen = false;

        // ------ обработчики ------

        // закрыть селект, если клик вне его
        function onDocumentClick(event) {
            if (!elem.contains(event.target)) close();
        }

        // ------------------------

        function setValue(title, value) {
            elem.querySelector('.title').innerHTML = title;

            var widgetEvent = new CustomEvent('select', {
                bubbles: true,
                detail: {
                    title: title,
                    value: value
                }
            });

            elem.dispatchEvent(widgetEvent);

        }

        function toggle() {
            if (isOpen) close()
            else open();
        }

        function open() {
            elem.classList.add('open');
            document.addEventListener('click', onDocumentClick);
            isOpen = true;
        }

        function close() {
            elem.classList.remove('open');
            document.removeEventListener('click', onDocumentClick);
            isOpen = false;
        }

    }

</script>
    <script>
        var num = 2;
        var nums = 3
        let ul = document.querySelector('#ul-select')
        ul.addEventListener("scroll", function (){
           if(ul.scrollTop + ul.clientHeight >= ul.scrollHeight){
               $.ajax({
                   url:'/textC/s/'+ num,
                   type:'Get',
                   date: nums,
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               }).done(function (data){
                    $('.ul-select').html(date)

               });
               num = num + 2;
           }
        });
    </script>

@endsection

