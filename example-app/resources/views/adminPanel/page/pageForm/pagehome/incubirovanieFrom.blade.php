@extends('../../../adminPanel/app')
@section('incubitovanie')
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
                                    
                                  <form method="post" action="{{route('adminIncubirovanetext.store')}}" >
                                    @csrf
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Заголовок</label>
                                                    <input name="title" type="text" class="form-control" id="formGroupExampleInput">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput2">Текст</label>
                                                    <textarea style="min-height: 100px" name="text" class="form-control  "  id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                               
                                                <input type="submit"  class="btn btn-primary">
                                            </form>


                                </div>
                            </div>
                        </div>
                        
             
                            
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
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Заголовок</a>
                                            </li>
                                        @foreach($text as $item)
                                        <li class="nav-item">
                                            <a class="nav-link text-truncate" id="home-tab" data-toggle="tab" href="#k{{$item['id']}}" role="tab"style="max-width: 100px;" aria-controls="home" aria-selected="true">{{$item['title']}}</a>
                                        </li>
                                        @endforeach
                                     
                                        
                                    </ul>
                                    <div class="tab-content" id="simpletabContent">
                                        <div class="tab-pane fade show active" id="pills-home" style="width: 500px" role="tabpanel" aria-labelledby="home-tab">
                                             <form method="post" action="{{route('adminIncubirovane.update', 1)}}" enctype="multipart/form-data">
                                                 @csrf
                                                 @method('PUT')
                                                    <img class="rounded d-block w-100" src="{{asset('/storage/'.$title[0]['image'])}}">
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Заголовок</label>
                                                    <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{$text[0]['title']}}">
                                                </div>
                                               <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Подзаголовок</label>
                                                    <input name="text" type="text" class="form-control" id="formGroupExampleInput" value="{{$text[0]['text']}}">
                                                </div>
                                                <div class="form-group mb-4 mt-3">
                                                                <label for="exampleFormControlFile1">Загрузите картинку</label>
                                                                <input type="file" name="image" value="" class="form-control-file"  id="exampleFormControlFile1">
                                                            </div>
                                                <div class="d-flex justify-content-between">
                                                    <input type="submit"  class="btn btn-primary">
                                                     <a href="" data-toggle="modal" data-target="#f">
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                    </a>
                                                </div>
                                                
                                            </form>  
                                        </div>
                                        <div id="f" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить?</h4>
                                                    </div>
                                                    <a href="{{route('adminIncubirovane.show', 1)}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($text as $item)
                                            
                                        
                                        <div class="tab-pane fade show " id="k{{$item['id']}}" style="width: 500px" role="tabpanel" aria-labelledby="home-tab">
                                             <form method="post" action="{{route('adminIncubirovanetext.update', $item['id'])}}" >
                                                 @csrf
                                                 @method('PUT')
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput " >Заголовок</label>
                                                    <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{$item['title']}}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput2">Текст</label>
                                                     <textarea style="min-height: 100px" name="text" class="form-control  "  id="exampleFormControlTextarea1" rows="3">{{$item['text']}}</textarea>
                                                </div>
             
                                                 <div class="d-flex justify-content-between">
                                                    <input type="submit"  class="btn btn-primary">
                                                     <a href="" data-toggle="modal" data-target="#h{{$item['id']}}">
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                    </a>
                                                </div>
                                                
                                            </form>  
                                        </div>
                                        <div id="h{{$item['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить?</h4>
                                                    </div>
                                                    <a href="{{route('adminIncubirovanetext.show',$item['id'] )}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                         
                                       
                                       
                                        
                                       
                                    </div>
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