@extends('../../../adminPanel/app')
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
    
    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endsection
@section('content')
    <div class="main-container" id="container">

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            
                            <a href="#tabsSimple" class="active nav-link">Simple</a>
                            
                        </div>
                    </div>
                    
                    <div class="row layout-top-spacing">
<div id="slider-create" class="col-lg-12 layout-spacing" >
                                        <div class="col-lg-12 col-12 layout-spacing">
                                            <div class="statbox widget box box-shadow"  style="width: 500px">
                                               
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
                                                            <input type="text" name="title" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$video[0]['title']}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="exampleFormControlInput2">Подзоголовок</label>
                                                            <input type="text" name="text" class="form-control" id="h-text1" aria-describedby="h-text1" value="{{$video[0]['text']}}">
                                                        </div>
                                                       
                                                          <div class="d-flex justify-content-between">
                                                    <input type="submit"  class="btn btn-primary">
                                                     <a href="" data-toggle="modal" data-target="#f">
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                    </a>
                                                </div>
                                                <div id="f" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content p-1">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Вы точно хотите удалить?</h4>
                                                        </div>
                                                        <a href="{{route('video.show',1)}}" class="btn btn-primary mb-2">Да</a>
                                                    </div>
                                                </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                      
                    
                    </div>
                </div>
                
                </div>
                <!--  END CONTENT AREA  -->

    </div>
 @endsection
