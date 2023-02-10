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

                        <div class="col-lg-12 col-12 layout-spacing" >
                            <div class="statbox widget box box-shadow" style="width: 500px">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Добавить</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area simple-pills" >
                                    
                                  <form method="post" action="{{route('process.store')}}" >
                                    @csrf
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Процесс</label>
                                                    <input name="nameprocess" type="text" class="form-control" id="formGroupExampleInput">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput2">Порядковый номер</label>
                                                    <input  name="nomerprocess" type="text" class="form-control" id="formGroupExampleInput2" >
                                                </div>
                                                
                                                <input type="submit"  class="btn btn-primary">
                                            </form>


                                </div>
                            </div>
                        </div>
                        @if ( $process != [])
                            
                     <div class="row layout-top-spacing">

                        <div id="tabsSimple" class="col-lg-12 col-12 layout-spacing">
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#d{{$process[0]['id']}}" role="tab" aria-controls="home" aria-selected="true">{{$process[0]['nameprocess']}}</a>
                                        </li>
                                       @foreach ($process->slice(1) as $item)
                                        <li class="nav-item">
                                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#d{{$item['id']}}" role="tab" aria-controls="home" aria-selected="true">{{$item['nameprocess']}}</a>
                                        </li>
                                         @endforeach
                                     
                                        
                                    </ul>
                                    <div class="tab-content" id="simpletabContent">
                                        <div class="tab-pane fade show active" id="d{{$process[0]['id']}}" style="width: 500px" role="tabpanel" aria-labelledby="home-tab">
                                             <form method="post" action="{{route('process.update', $process[0]['id'])}}" >
                                                 @csrf
                                                 @method('PUT')
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Процесс</label>
                                                    <input name="nameprocess" type="text" class="form-control" id="formGroupExampleInput" value="{{$process[0]['nameprocess']}}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput2">Порядковый номер</label>
                                                    <input  name="nomerprocess" type="text" class="form-control" id="formGroupExampleInput2" value="{{$process[0]['nomerprocess']}}">
                                                </div>
                                              
                                                <div class="d-flex justify-content-between">
                                                    <input type="submit"  class="btn btn-primary">
                                                     <a href="" data-toggle="modal" data-target="#f{{$process[0]['id']}}">
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                    </a>
                                                </div>
                                            </form>  
                                        </div>
                                        <div id="f{{$process[0]['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить?</h4>
                                                    </div>
                                                    <a href="{{route('process.show', $process[0]['id'])}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
                                         @foreach ($process->slice(1) as $item)
                                        <div class="tab-pane fade show " id="d{{$item['id']}}" style="width: 500px" role="tabpanel" aria-labelledby="home-tab">
                                             <form method="post" action="{{route('process.update', $item['id'])}}" >
                                                 @csrf
                                                 @method('PUT')
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Процесс</label>
                                                    <input name="nameprocess" type="text" class="form-control" id="formGroupExampleInput" value="{{$item['nameprocess']}}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput2">Порядковый номер</label>
                                                    <input  name="nomerprocess" type="text" class="form-control" id="formGroupExampleInput2" value="{{$item['nomerprocess']}}">
                                                </div>
                                               
                                                 <div class="d-flex justify-content-between">
                                                    <input type="submit"  class="btn btn-primary">
                                                     <a href="" data-toggle="modal" data-target="#f{{$item['id']}}">
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                    </a>
                                                </div>
                                                
                                            </form>  
                                        </div>
                                        <div id="f{{$item['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить?</h4>
                                                    </div>
                                                    <a href="{{route('process.show', $item['id'])}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                         
                                       
                                       
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                    
                        @endif
                    </div>
                </div>
                
                </div>
                <!--  END CONTENT AREA  -->

    </div>
 @endsection
