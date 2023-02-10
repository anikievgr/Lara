@extends('../../../adminPanel/app')
@section('ocompany')
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
    
    <link href="{{asset('style/pageAdmin/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('style/pageAdmin/plugins/noUiSlider/custom-nouiSlider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('style/pageAdmin/plugins/bootstrap-range-Slider/bootstrap-slider.css')}}" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')
<div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#date_time_picker" class="active nav-link">Охват</a>
                            <a href="#slider-update" class="active nav-link">Изменить</a>
                        </div>
                    </div>
                    
                         <div class="row">
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Охват</h4>
                                    </div>
                                    </div>
                                </div>
                                <form method="post" action="{{route('ocompany.store')}}" class="p-1">
                                    @csrf
                                    @if ($procent == [])
                                        <div class="widget-content widget-content-area ">
                                    <div class="custom-progress bottom-right progress-down" style="width: 100%">
                                        <input name="procent" type="range" min="0" max="100" class="custom-range progress-range-counter" value="0">

                                        <div class="range-count"><span class="range-count-unit">Словения </span><span class="range-count-number" data-rangecountnumber="0">0</span> <span class="range-count-unit">%</span></div>
                                    </div>
                                    </div>
                                 
                                    @else
                                        <div class="widget-content widget-content-area ">
                                    <div class="custom-progress bottom-right progress-down" style="width: 100%">
                                        <input name="procent" type="range" min="0" max="100" class="custom-range progress-range-counter" value="{{$procent[0]['procent']}}">

                                        <div class="range-count"><span class="range-count-unit">Словения </span><span class="range-count-number" data-rangecountnumber="{{$procent[0]['procent']}}">{{$procent[0]['procent']}}</span> <span class="range-count-unit">%</span></div>
                                    </div>
                                    </div>
                                  
                                    @endif
                                      <button class="btn btn-primary mb-2">Отправить</button>
                                </form>
                                </div>
                            </div>

                            <div id="slider-update" class="col-lg-12 layout-spacing">
                                <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Изменить</h4>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <img class="rounded d-block w-100" src="{{asset('/storage/'.$ocompany[0]['image'])}}">
                                    <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }} 
                                        <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Заголовок</label>
                                        <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$ocompany[0]['title']}}">
                                        </div>
                                        
                                        <div class="form-group mb-4 mt-3">
                                        <label for="exampleFormControlFile1">Текст</label>
                                        <textarea name="text" style="min-height: 100px" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$ocompany[0]['titleLtext']}}</textarea>
                                        </div>
                                     
                                        <div class="form-group mb-4 mt-3">
                                                                <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                                <input type="file" name="image" value="" class="form-control-file"  id="exampleFormControlFile1">
                                                            </div>
                                        <input type="submit" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                    </div>

                                </div>
                                </div>

                            </div>
                            </div>
                </div>
                
            </div>

            
    </div>
                
               
      
        
  
 @endsection
