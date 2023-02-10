@extends('../../../adminPanel/app')
@section('sliderForm')
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
<div id="content" class="main-content">
            <div class="container">
                @if ($items == ['null'])
                        <div class="container">
                            <div class="row layout-top-spacing">
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
                                                <form method="post" action="{{route('bd.store')}} "enctype="multipart/form-data">                                                {{ csrf_field() }}
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlInput2">Текст №1</label>
                                                    <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlInput2">Текст №2</label>
                                                    <input type="text" name="subtitle" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                                </div>
                                                <div class="form-group mb-4 mt-3">
                                                    <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                    <input type="file" name="image"class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                                <input type="submit"  class="mt-4 mb-4 btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                </div>
                            </div>
                        </div>
                @else
                    @if ($id == '')
                     <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#slider-create" class=" nav-link">Создать слайд</a>
                            <a href="#slider-update" class=" nav-link">Обновить</a>
                            <a href="#slider-delete" class=" nav-link">Удалить</a>

                        </div>
                    </div>
                @endif

                <div class="container">
                    <div class="row layout-top-spacing">



                                @if ($id == '')
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
                                                    <form method="post" action="{{route('bd.store')}} "enctype="multipart/form-data">                                          {{ csrf_field() }}
                                                        <div class="form-group mb-4">
                                                            <label for="exampleFormControlInput2">Текст №1</label>
                                                            <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="exampleFormControlInput2">Текст №2</label>
                                                            <input type="text" name="subtitle" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                                        </div>
                                                        <div class="form-group mb-4 mt-3">
                                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                            <input type="file" name="image"class="form-control-file" id="exampleFormControlFile1">
                                                        </div>
                                                        <input type="submit"  class="mt-4 mb-4 btn btn-primary">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <a class="carousel-item active" href="{{route('bd.index',['id' => $fierstItems['id']] )}}">
                                                                <img class="rounded d-block w-100" src="{{asset('/storage/'.$fierstItems['image'])}}">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5 class="text-light ">{{$fierstItems['title']}}</h5>
                                                                    <p class="text-light">{{$fierstItems['subtitle']}}</p>
                                                                </div>
                                                            </a>
                                                        @foreach ($items as $item)
                                                            <a class="carousel-item" href="{{route('bd.index',['id' => $item['id']] )}}">
                                                            <img class="rounded d-block w-100" src="{{asset('/storage/'.$item['image'])}}" >
                                                            <div class="carousel-caption d-none d-md-block">
                                                                    <h5 class="text-light ">{{$item['title']}}</h5>
                                                                    <p class="text-light">{{$item['subtitle']}}</p>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls_1" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
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
                                        <div id="carouselExampleControls" class="carousel slide" data-pause="hover">
                                            <div class="carousel-inner">
                                                <a class="carousel-item active" href="{{route('bd.delete', $fierstItems['id'])}}">
                                                        <img class="rounded d-block w-100" src="{{asset('/storage/'.$fierstItems['image'])}}">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5 class="text-light ">{{$fierstItems['title']}}</h5>
                                                            <p class="text-light">{{$fierstItems['subtitle']}}</p>
                                                        </div>
                                                    </a>
                                                @foreach ($items as $item)
                                                    <a class="carousel-item" href="{{route('bd.delete', $item['id'])}}">
                                                    <img class="rounded d-block w-100" src="{{asset('/storage/'.$item['image'])}}" >
                                                    <div class="carousel-caption d-none d-md-block">
                                                            <h5 class="text-light ">{{$item['title']}}</h5>
                                                            <p class="text-light">{{$item['subtitle']}}</p>
                                                        </div>
                                                    </a>
                                                @endforeach



                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @else
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
                                                    <div class="widget-content widget-content-area">
                                                                    <img class="rounded d-block w-100" src="{{asset('/storage/'.$items['image'])}}">
                                                        <form method="post" action="{{route('bd.update',$id)}}"enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            @method('PUT')
                                                            <div class="form-group mb-4">
                                                                <label for="exampleFormControlInput2">Текст №1</label>
                                                                <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$items['title']}}"">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="exampleFormControlInput2">Текст №2</label>
                                                                <input type="text" name="subtitle" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$items['subtitle']}}"">
                                                            </div>
                                                            <div class="form-group mb-4 mt-3">
                                                                <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                                <input type="file" name="image" value="" class="form-control-file"  id="exampleFormControlFile1">
                                                            </div>
                                                            <input type="submit"  class="mt-4 mb-4 btn btn-primary">
                                                        </form>
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
