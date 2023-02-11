@extends('../../../adminPanel/app')
@section('product')  <li class='menu active' > @endsection
@section('scriptAdd')

        <script src="{{asset('style/pageAdmin/plugins/table/datatable/datatables.js')}}"></script>
        <script>
            $('#zero-config').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
        </script>    @endsection
@section('headerAddLink')
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/table/datatable/dt-global_style.css')}}">
        <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css" rel="stylesheet')}}" type="text/css" />
        <link href="{{asset('style/pageAdmin/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Продукты</th>
                                    <th>Цена</th>
                                    <th class="no-content">Редактирование</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product['product']}}</td>
                                    <td>{{$product['price']}} рублей</td>
                                    <td><a href="" data-toggle="modal" data-target="#d{{$product['id']}} "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- Button trigger modal -->


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

        </div>
@endsection
