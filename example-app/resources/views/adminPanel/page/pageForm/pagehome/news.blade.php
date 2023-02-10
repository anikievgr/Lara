@extends('../../../adminPanel/app')
@section('news')
      active
    @endsection
@section('scriptAdd')

 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
 <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
    @endsection
@section('headerAddLink')
    <link href="{{asset('style/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div id="navSection" data-spy="affix" class="nav  sidenav">
                <div class="sidenav-content">
                    <a href="#create-news" class=" nav-link">Создать запись</a>
                    <a href="#create-delete" class=" nav-link">Удалить запись</a>

                </div>
            </div>
            <div class="container">
                <div class="row layout-top-spacing">
                    @if($updateNews != 'null')
                        <div id="create-news" class="col-lg-12 layout-spacing">
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Создать запись</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <img src="{{asset('/storage/'.$updateNews['image'])}}">
                                        <form method="post" action="{{route('openAdminNewsGroup.update', $updateNews['id'])}} "enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Заголовок</label>
                                                <input name="title" type="text" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$updateNews['title']}}">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Текст</label>
                                                <textarea style="min-height: 100px" name="text" class="form-control"  id="exampleFormControlTextarea1" rows="3">{{$updateNews['text']}}</textarea>
                                            </div>
                                            <div class="form-group mb-4 mt-3">
                                                <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                            <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @else

                    <div id="create-news" class="col-lg-12 layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Создать запись</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('openAdminNewsGroup.store')}} "enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Заголовок</label>
                                            <input name="title" type="text" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Текст</label>
                                            <textarea style="min-height: 100px" name="text" class="form-control  "  id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                            <input  name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if($news!= 'null')
                    <div id="create-delete" class="col-lg-12 layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Удалить запись</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area data-mdb-perfect-scrollbar overflow-auto mainNews" >
                                    @foreach($news as  $new)

                                    <div class="card mb-3 mainCardNews" style="max-width: 100%;" data-toggle="modal" data-target="#d{{$new['id']}}">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{asset('/storage/'.$new['image'])}}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$new['title']}}</h5>
                                                    <p class="card-text">{{$new['text']}}</p>
                                                    <p class="card-text"><small class="text-muted">{{$new['updated_at']}}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div id="d{{$new['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить?</h4>
                                                    </div>
                                                    <a href="{{route('openAdminNewsGroup.show',$new['id'])}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="create-update" class="col-lg-12 layout-spacing">
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Обновить запись</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area data-mdb-perfect-scrollbar overflow-auto mainNews" >
                                        @foreach($news as  $new)
                                            <a href="{{route('NewsController.updatePages', $new['id'])}}" >
                                            <div class="card mb-3 mainCardNews" style="max-width: 100%;" >
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="{{asset('/storage/'.$new['image'])}}" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{$new['title']}}</h5>
                                                            <p class="card-text">{{$new['text']}}</p>
                                                            <p class="card-text"><small class="text-muted">{{$new['updated_at']}}</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
 @endsection
