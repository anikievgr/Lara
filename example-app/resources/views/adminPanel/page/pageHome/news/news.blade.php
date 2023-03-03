@extends('../../../adminPanel/app')
@section('name')
    Новости
@endsection
@section('news')
      active
    @endsection
@section('scriptAdd')

 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>

 <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
 <script src="{{asset('style/pageAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
 <script src="{{asset('style/js/main.js')}}"></script>
 <script>
     //First upload
     var firstUpload = new FileUploadWithPreview('myFirstImage')
     //Second upload
     var secondUpload = new FileUploadWithPreview('mySecondImage')

 </script>
    @endsection
@section('headerAddLink')
    <link href="{{asset('style/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/assets/css/elements/alert.css')}}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')
    @if ( count($news) != 0)
            <div id="navSection" data-spy="affix" class="nav  sidenav">
                <div class="sidenav-content">
                    <a href="#news-create" class=" nav-link">Создать запись</a>
                    <a href="#news-update" class=" nav-link">Обнавить запись</a>
                    <a href="#news-deleted" class=" nav-link">Обнавить запись</a>

                </div>
            </div>
    @endif
            <div class="container">
                <div class="container">
                    <div class="row layout-top-spacing">
                        <!--start создать новость -->
                        <div id="news-create" class="col-lg-12 layout-spacing">
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">

                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                                <h4>Создать новость</h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="widget-content widget-content-area">



                                        <form method="post" action="{{route('news.store')}} "enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Заголовок</label>
                                                <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{old('title')}}">
                                            </div>
                                            @if($errors->has('title'))
                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен заголовок </div>
                                            @endif
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Подзаголовок</label>
                                                <input type="text" name="text" class="form-control" id="h-text1" aria-describedby="h-text1"  value="{{old('text') }}">
                                            </div>
                                            @if($errors->has('text'))
                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен подзаголовок </div>
                                            @endif
                                            <div class="widget-content widget-content-area">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Убрать фото <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                            @if($errors->has('image'))
                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужна картинка</div>
                                            @endif
                                            <input type="submit"  class="mt-4 mb-4 btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--end создать новость-->
                        @if(count($news) != 0)
                            <!--start редактировать новость -->
                            <div id="news-update" class="col-lg-12 layout-spacing">
                                <div class="col-lg-12 col-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Обновить запись</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area mainScrollBar data-mdb-perfect-scrollbar overflow-auto mainNews" >
                                            @foreach($news as  $newsItem)
                                                <a href="{{route('news.show', $newsItem['id'])}}" >
                                                    <div class="card mb-3 mainCardNews">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="{{asset('/storage/'.$newsItem['image'])}}" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{$newsItem['title']}}</h5>
                                                                    <p class="card-text">{{$newsItem['text']}}</p>
                                                                    <p class="card-text"><small class="text-muted">{{$newsItem['updated_at']}}</small></p>
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
                            <!--end редактировать новость -->
                            <!--start удалить новость -->
                            <div id="news-deleted" class="col-lg-12 layout-spacing">
                                <div class="col-lg-12 col-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Удалить запись</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area mainScrollBar data-mdb-perfect-scrollbar overflow-auto mainNews" >
                                            @foreach($news as  $newsItem)
                                                <a href="#"  data-toggle="modal" data-target="#d{{$newsItem['id']}}" >
                                                    <div class="card mb-3 mainCardNews">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="{{asset('/storage/'.$newsItem['image'])}}" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{$newsItem['title']}}</h5>
                                                                    <p class="card-text">{{$newsItem['text']}}</p>
                                                                    <p class="card-text"><small class="text-muted">{{$newsItem['updated_at']}}</small></p>
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
                            <!--end удалить новость -->
                            <!--start модалки-->
                            @foreach ($news as $newsItem)

                                <div class="modal fade" id="d{{$newsItem['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('news.destroy', $newsItem['id']) }}" method="POST">
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
            </div>
 @endsection
