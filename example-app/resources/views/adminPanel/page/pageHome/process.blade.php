@extends('../../../adminPanel/app')
@section('name')
    Процессы
@endsection
@section('process')
      active
    @endsection
@section('scriptAdd')

 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
 <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/noUiSlider/nouislider.min.js')}}"></script>

    <script src="{{asset('style/pageAdmin/plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
    @endsection
@section('headerAddLink')
    <link href="{{asset('style/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/assets/css/elements/alert.css')}}">

    @endsection
@section('content')

        <div class="container">
            <div class="container">

                <div id="navSection" data-spy="affix" class="nav  sidenav">
                    <div class="sidenav-content">

                        <a href="#add" class=" nav-link">Добавить</a>
                        <a href="#deletedAppdate" class=" nav-link">Обнавить</a>

                    </div>
                </div>

                <div class="row layout-top-spacing">
                    <!--start создать процесс -->
                    <div id="add"class="col-lg-12 col-12 layout-spacing" >
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Добавить</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area simple-pills" >

                                <form method="post" action="{{route('process.store')}}" >
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="formGroupExampleInput " >Процесс</label>
                                        <input name="nameprocess" type="text" value="{{old('nameprocess')}}"class="form-control" id="formGroupExampleInput">
                                    </div>
                                    @if($errors->has('nameprocess'))
                                        <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужно название </div>
                                    @endif
                                    <div class="form-group mb-4">
                                        <label for="formGroupExampleInput2">Порядковый номер</label>
                                        <input  name="nomerprocess" type="text" class="form-control" value="{{old('nomerprocess')}}" id="formGroupExampleInput2" >
                                    </div>
                                    @if($errors->has('nomerprocess'))
                                    <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен порядковый номер </div>
                                    @endif
                                    <div class="form-group mb-4">
                                        <label for="formGroupExampleInput2">Порядковый номер</label>
                                        <input  name="color" type="color" class="form-control"  value="" id="formGroupExampleInput2" >
                                    </div>

                                    <input type="submit"  class="btn btn-primary">
                                </form>


                            </div>
                        </div>
                    </div>
                    <!--end создать процесс -->
                    @if ( count($processSort) != 0)
                        <!--start обновить, удалить процесс -->
                        <div id="deletedAppdate" class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Обнoвить/Удалить</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area simple-tab">
                                        <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">

                                            @foreach ($processSort as $key => $item)
                                                <li class="nav-item">
                                                    <a @class(['nav-link', 'active' => $loop->first]) id="home-tab" data-toggle="tab" href="#d{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{$item['nameprocess']}}</a>
                                                </li>
                                            @endforeach


                                        </ul>
                                        <div class="tab-content" id="simpletabContent">
                                          @foreach ($processSort as $key => $item)
                                                <div @class(['tab-pane fade show ', 'active' => $loop->first])id="d{{$key}}"  role="tabpanel" aria-labelledby="home-tab">
                                                    <form method="post" action="{{route('process.update', $item['id'])}}" >
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group mb-4">
                                                            <label for="formGroupExampleInput " >Процесс</label>
                                                            <input name="nameprocess" type="text" class="form-control" id="formGroupExampleInput"  value="{{$item['nameprocess']}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="formGroupExampleInput2">Порядковый номер</label>
                                                            <input  name="nomerprocess" type="text" class="form-control" id="formGroupExampleInput2" value="{{$key}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="formGroupExampleInput2">Цвет</label>
                                                            <input  name="color" type="color" class="form-control" id="formGroupExampleInput2"  value="{{$item['color']}}">
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <input type="submit"  class="btn btn-primary">
                                                            <a href="" data-toggle="modal" data-target="#f{{$key}}">
                                                                <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                            </a>
                                                        </div>
                                                    </form>
                                                </div>

                                            @endforeach





                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--end обновить, удалить процесс -->
                    <!--start модалки-->
                        @foreach ($processSort as $key => $item)

                        <div class="modal fade" id="f{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Удаление</h5>

                                    </div>
                                    <div class="modal-body">
                                        <p class="modal-text">Вы точно хотите удалить? Удаленные данные невозможно будет востановить.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                            Нет
                                        </button>
                                        <form action="{{ route('process.destroy', $item['id']) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-primary">Да</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                     <!--start модалки-->
                    @endif
                </div>
            </div>




 @endsection
