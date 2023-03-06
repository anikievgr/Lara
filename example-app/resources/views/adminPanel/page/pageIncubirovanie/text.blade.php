@extends('../../../adminPanel/app')
@section('name')
    Инкубирование
@endsection
@section('incubitovanie')
      active
    @endsection
@section('scriptAdd')
 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
 <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
    @endsection
@section('headerAddLink')
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')

    <div class="container">
        <div class="container">

            <div id="navSection" data-spy="affix" class="nav  sidenav">
                <div class="sidenav-content">

                    <a href="#creat" class=" nav-link">Создать запись</a>
                    <a href="#ud" class=" nav-link">Обнавить/удалить запись</a>

                </div>
            </div>

            <div class="row layout-top-spacing">
                <!--start создать запись-->
                <div id="creat" class="col-lg-12 col-12 layout-spacing" >
                    <div class="statbox widget box box-shadow" style="">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Добавить</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area simple-pills" >

                            <form method="post" action="{{route('textI.createNewText')}}" >
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="formGroupExampleInput " >Заголовок</label>
                                    <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{old('title')}}">
                                </div>
                                @if($errors->has('title'))
                                    <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен загловок</div>
                                @endif
                                <div class="form-group mb-4">
                                    <label for="formGroupExampleInput2">Текст</label>
                                    <textarea style="min-height: 100px" name="text" class="form-control  "  id="exampleFormControlTextarea1" rows="3">{{old('text')}}</textarea>
                                </div>
                                @if($errors->has('text'))
                                    <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен текст</div>
                                @endif
                                <input type="submit"  class="btn btn-primary">
                            </form>


                        </div>
                    </div>
                </div>
                <!--end создать запись-->



                <!--start обновить/удалить запись-->
                <div id="ud" class="col-lg-12 col-12 layout-spacing">
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
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Заголовок</a>
                                </li>
                                @foreach($text as $item)
                                    <li class="nav-item">
                                        <a class="nav-link text-truncate" id="home-tab" data-toggle="tab" href="#k{{$item['id']}}" role="tab"style="" aria-controls="home" aria-selected="true">{{$item['title']}}</a>
                                    </li>
                                @endforeach


                            </ul>
                            <div class="tab-content" id="simpletabContent">
                                <div class="tab-pane fade show active" id="pills-home" style="" role="tabpanel" aria-labelledby="home-tab">
                                    <form method="post" action="{{route('textI.updateTitle')}}" >
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput " >Заголовок</label>
                                            <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{$title[0]['title']}}">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <input type="submit"  class="btn btn-primary">
                                            <a href="" data-toggle="modal" data-target="#f">
                                                <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                                @foreach ($text as $item)
                                    <div class="tab-pane fade show " id="k{{$item['id']}}" style="" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="post" action="{{route('textI.updateText', $item['id'])}}" >
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="formGroupExampleInput " >Заголовок</label>
                                                <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{$item['title']}}">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="formGroupExampleInput2">Текст</label>
                                                <textarea style="min-height: 100px" name="text" class="form-control  "  id="exampleFormControlTextarea1" rows="3">{{$item['text']}}</textarea>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <input type="submit"  class="btn btn-primary">
                                                <a href="" data-toggle="modal" data-target="#h{{$item['id']}}">
                                                    <div class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></div>
                                                </a>
                                            </div>

                                        </form>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <!--end обновить/удалить запись-->
            </div>
        </div>
    </div>
    <!--start модалки-->

    <div class="modal fade" id="f" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="{{route('textI.deleteTitle')}}">Да</a>
                </div>
            </div>
        </div>
    </div>
    @foreach ($text as $item)
        <div class="modal fade" id="h{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-primary" href="{{route('textI.deleteText', $item['id'])}}">Да</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--start модалки-->
@endsection
