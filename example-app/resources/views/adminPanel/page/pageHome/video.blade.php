@extends('../../../adminPanel/app')
@section('name')
    Видео
@endsection
@section('video')
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


    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')
            <div class="container">
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div id="slider-create" class="col-lg-12 layout-spacing" >
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow"  style="">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Обновить/Удалить </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form method="post" action="{{route('video.update', 1)}} "enctype="multipart/form-data" >
                                            {{ csrf_field() }}
                                              @method('PUT')
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Заголовок</label>
                                                <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" @if($video[0]['title'] == '' && $video[0]['text'] == '') value="{{old('title')}}"  @else value="{{$video[0]['title']}}" @endif >
                                            </div>
                                            @if($errors->has('title'))
                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен загловок</div>
                                            @endif
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlInput2">Подзоголовок</label>
                                                <input type="text" name="text" class="form-control" id="h-text1" aria-describedby="h-text1" @if($video[0]['title'] == '' && $video[0]['text'] == '') value="{{old('text')}}"  @else value="{{$video[0]['text']}}" @endif >
                                            </div>
                                            @if($errors->has('text'))
                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужен текст</div>
                                            @endif
                                            <div class="d-flex justify-content-between">
                                                <input type="submit"  class="btn btn-primary">
                                                <a href="" data-toggle="modal" data-target="#f">
                                                    <div class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></div>
                                                </a>
                                            </div>
                                        </form>
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
                                            <form action="{{ route('video.destroy', 1) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-primary">Да</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--start модалки-->
                        </div>
                    </div>

                </div>
            </div>

 @endsection
