@extends('../../../adminPanel/app')
@section('name')
    Слайдер
@endsection
@section('sliderForm')
      active
    @endsection
@section('scriptAdd')

    <link href="{{asset('style/css/main.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
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
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/assets/css/elements/alert.css')}}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="container">
            <!--start навигация-->
                <div id="navSection" data-spy="affix" class="nav  sidenav">
                <div class="sidenav-content">
                    <a href="#slider-create" class=" nav-link ">Создать слайд</a>
                    <a href="#slider-update" class=" nav-link">Обновить</a>
                    <a href="#slider-delete" class=" nav-link">Удалить</a>
                </div>
            </div>
            <!--end Навигация-->

            <div class="row layout-top-spacing">
                <!--start создать слайд-->
                <div id="slider-create" class="col-lg-12 layout-spacing">
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">

                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                        <h4>Создать слайд</h4>

                                    </div>

                                </div>

                            </div>

                            <div class="widget-content widget-content-area">



                                <form method="post" action="{{route('slider.store')}} "enctype="multipart/form-data">
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
                                        <input type="text" name="subtitle" class="form-control" id="h-text1" aria-describedby="h-text1"  value="{{old('subtitle') }}">
                                    </div>
                                    @if($errors->has('subtitle'))
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
            <!--end создать слайд-->


                <!--start обновить слайд-->
                    <div id="slider-update" class="col-lg-12 layout-spacing">
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Обновить слайд</h4>
                                    </div>
                                </div>
                            </div>
                            <div id="carouselExampleControls_1" class="carousel slide"  data-ride="carousel" data-pause="hover">
                                <div class="carousel-inner">

                                    @foreach ($slides as $slide)
                                        <a  @class(['carousel-item', 'active' => $loop->first]) href="{{route('slider.show', $slide['id'])}}">
                                            <img class="rounded d-block " width="100%" height="100%"  src="{{asset('/storage/'.$slide['image'])}}" >
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 class="text-light ">{{$slide['title']}}</h5>
                                                <p class="text-light">{{$slide['subtitle']}}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls_1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-news.bladehidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls_1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--end обновить слайд-->

                    <!--start удалить слайд-->
                    <div id="slider-delete" class="col-lg-12 layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Удалить слайд</h4>
                                        </div>
                                    </div>
                                </div>
                                <div id="carouselExampleControls_2" class="carousel slide"  data-ride="carousel" data-pause="hover">
                                    <div class="carousel-inner">

                                        @foreach ($slides as $slide)

                                            <div  @class(['carousel-item', 'active' => $loop->first])   data-toggle="modal" data-target="#d{{$slide['id']}}">
                                                <img class="rounded d-block " width="100%" height="100%"  src="{{asset('/storage/'.$slide['image'])}}" >
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="text-light ">{{$slide['title']}}</h5>
                                                    <p class="text-light">{{$slide['subtitle']}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls_2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls_2" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end удалить слайд-->
                <!--start модалки-->
                    @foreach ($slides as $slide)

                        <div class="modal fade" id="d{{$slide['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('slider.destroy', $slide['id']) }}" method="POST">
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

        </div>

        </div>
    </div>

@endsection
