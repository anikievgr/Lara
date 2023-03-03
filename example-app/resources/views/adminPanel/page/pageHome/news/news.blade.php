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
    @endsection
@section('headerAddLink')
    <link href="{{asset('style/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')

            <div id="navSection" data-spy="affix" class="nav  sidenav">
                <div class="sidenav-content">
                    <a href="#create-news" class=" nav-link">Создать запись</a>
                    <a href="#create-delete" class=" nav-link">Удалить запись</a>

                </div>
            </div>
            <div class="container">
                <div class="container">
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

                    </div>
                </div>
            </div>
 @endsection
