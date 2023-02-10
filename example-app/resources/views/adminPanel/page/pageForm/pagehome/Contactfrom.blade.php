@extends('../../../adminPanel/app')

@section('contact')
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
                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#cart" class=" nav-link">Карта</a>
                        </div>
                         </div>
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div id="cart" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Ссылка на карту</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('form')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Текст №1</label>
                                            <input type="text" name="map" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
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