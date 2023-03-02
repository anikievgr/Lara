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


            <div class="row layout-top-spacing">
                <!--start обновить  слайд-->
                    <div id="slider-create" class="col-lg-12 layout-spacing">
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


                                <form method="post" action="{{route('slider.update', $slide['id'])}})}} "enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="form-group mb-4">
                                        <img width="100%" height="100%" src="{{asset('/storage/'.$slide['image'])}}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Заголовок</label>
                                        <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$slide['title']}}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Подзаголовок</label>
                                        <input type="text" name="subtitle" class="form-control" id="h-text1" aria-describedby="h-text1"  value="{{$slide['subtitle'] }}">
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Убрать фото <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input  name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview " ></div>
                                        </div>
                                    </div>
                                    <input type="submit"  class="mt-4 mb-4 btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!--end обновить слайд-->


        </div>

        </div>
    </div>

@endsection
