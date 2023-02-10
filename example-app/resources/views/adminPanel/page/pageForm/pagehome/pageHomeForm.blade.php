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
                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#slider" class=" nav-link">Слайдер</a>
                            <a href="#text1" class=" nav-link">Текст№1</a>
                            <a href="#text2" class=" nav-link">Текст№2</a>
                            <a href="#card1" class=" nav-link">Карточка №1</a>
                            <a href="#gallery" class=" nav-link">Галлерея</a>
                            <a href="#card2" class=" nav-link">Карточка №2(video)</a>
                            <a href="#news" class=" nav-link">Новости</a>
                            <a href="#company" class=" nav-link">О компании</a>
                        </div>
                         </div>
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div id="slider" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Слайдер</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('form')}} "enctype="multipart/form-data">
                                          {{ csrf_field() }}
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
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                          </div>

   
                        <div id="text1" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Текст №1</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <textarea style="min-height: 100px" class="form-control  "  id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="code-section-container show-code">
                                                <div class="code-section text-left">
                                            <p>Разведение индеек аналогично разведению другой домашней птицы. Однако...</p>
                                        </div>
                                    </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                         </div>
                        <div id="text2" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Текст №2</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <textarea style="min-height: 100px" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="code-section-container show-code">
                                                <div class="code-section text-left">
                                            <p>Яйца индейки похожи по составу на куриные яйца, а также имеют ...</p>
                                        </div>
                                    </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                         </div>
                        <div id="card1" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Карточка №1</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Ввите текст</label>
                                            <textarea style="min-height: 100px" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <p>ЛУЧШЕ ОДИН РАЗ УВИДЕТЬ, ЧЕМ СТО РАЗ...</p>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                         </div>
                        <div id="gallery" class="col-lg-12 col-12  layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Галлерея</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                            <div class="form-group mb-4">
                                                <label for="disabledSelect">Категория</label>
                                                <select id="disabledSelect" class="form-control">
                                                    <option>Продукты</option>
                                                     <option>Обеспечение</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                            <button type="submit" class="btn btn-primary mt-0">Отправить</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                         </div>
                        <div id="card2" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Карточка №2</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Ввите текст</label>
                                            <input type="text" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <p>ШИРОКОГРУДАЯ БРОНЗОВАЯ...</p>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите видео</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                         </div>
                        <div id="news" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Новости</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Тема</label>
                                            <input type="text" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Новость</label>
                                            <textarea style="min-height: 100px" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                         </div>
                            
                            
                          </div>
                        <div id="company" class="col-lg-12 layout-spacing">
                           <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>О компании</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Заголовок</label>
                                            <input type="text" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Подзаголовок</label>
                                            <input type="text" class="form-control" id="h-text1" aria-describedby="h-text1" placeholder="">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">Текст</label>
                                            <textarea style="min-height: 100px" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1">Загрузите картинку</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
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