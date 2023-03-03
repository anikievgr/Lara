@extends('../../../adminPanel/app')
@section('name')
    Галлерея
@endsection
@section('galerea')
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
    <link href="{{asset('style/pageAdmin/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')

                @if(count($gallery) != 0)
                     <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#galerey-create" class=" nav-link ">Сохранить фотографию</a>
                            <a href="#galerey-delete" class=" nav-link">Удалить фотографию</a>
                            <a href="#galerey-delete_category" class=" nav-link">Удалить категорию</a>
                        </div>
                    </div>
                @endif
                    <div class="container">
                        <div class="container">
                            <div class="row layout-top-spacing">
                                <!--start  довавить-->
                                <div id="galerey-create" class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Галерея</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <form class="select mt-4" method="post" action="{{route('gallery.store')}} "enctype="multipart/form-data" novalidate action="javascript:void(0);">
                                                 {{ csrf_field() }}
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div id="select_menu" class="form-group mb-4">
                                                            <label for="">Выберите категорию</label>
                                                            <select class="custom-select " id="select" name="select" required>
                                                              <option value="buutonAddCategory" > Создать новую</option>
                                                                @foreach($gallery as  $category)
                                                                    <option value="{{$category['id']}}">{{$category['title']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="widget-content widget-content-area">
                                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                                              <div id="addCategory" class="form-group mb-4">
                                                                    <label for="exampleFormControlInput2">Название категории</label>
                                                                    <input type="text" name="new-category" class="form-control" id="inputNewCategory"  aria-describedby="h-text1" value="{{old('new-category') }}">
                                                                </div>
                                                            @if($errors->has('new-category'))
                                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Нужно название категории</div>
                                                            @endif
                                                            <label>Убрать (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                            @if($errors->has('image'))
                                                                <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong>Обязательно нужна картинка</div>
                                                            @endif
                                                        </div>
                                                </div>
                                                <button class="btn btn-primary mt-2" type="submit">Отправить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end  довавить-->
                                @if(count($gallery) != 0)
                                    <!--start  удалить картинку-->
                                    <div id="galerey-delete_category" class="col-lg-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Удалить фото</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area simple-tab">
                                                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active"  id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">Все</a>
                                                    </li>
                                                    @foreach($gallery->slice(0,3) as $category)
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#d{{$category['id']}}" role="tab" aria-controls="home" aria-selected="true">{{$category['title']}}</a>
                                                        </li>
                                                    @endforeach

                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Другие категории <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                                                        <div class="dropdown-menu">
                                                            @foreach($gallery->slice(3,30) as $category)
                                                                <a class="dropdown-item" id="profile-tab" data-toggle="tab" href="#d{{$category['id']}}" role="tab" aria-controls="profile" aria-selected="false">{{$category['title']}}</a>
                                                            @endforeach
                                                        </div>
                                                    </li>

                                                </ul>
                                                <div class="tab-content" id="simpletabContent">

                                                    <div class="tab-pane active show "    id="all" role="tabpanel" aria-labelledby="home-tab">
                                                        @foreach($gallery as $category)
                                                            @foreach($category->posts as $post)
                                                                <a href="#"  class="m-2 d-inline-block"  data-toggle="modal" data-target="#m{{$post['id']}}"><img width="200px" src="{{asset('/storage/'.$post['image'])}}"></a>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    @foreach($gallery as $category)
                                                        <div class="tab-pane"   id="d{{$category['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                            @foreach($category->posts as $post)
                                                                <a href="#" class="m-2" data-toggle="modal" data-target="#m{{$post['id']}}"><img width="200px" src="{{asset('/storage/'.$post['image'])}}"></a>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                    <!--end  удалить картинку-->
                                    <!--start  удалить картинку-->
                                    <div id="galerey-delete" class="col-lg-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Удалить категорию</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area simple-tab">

                                                <div class="d-flex justify-content-center flex-wrap">
                                                    @foreach($gallery as $category)
                                                        <button class="btn btn-primary m-2" data-toggle="modal" data-target="#h{{$category['id']}}">{{$category['title']}}</button>
                                                    @endforeach
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                    <!--end  удалить картинку-->
                                    <!--start модалки удалить фото-->
                                    @foreach ($gallery as $category)
                                        @foreach($category->posts as $post)
                                            <div class="modal fade" id="m{{$post['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('gallery.destroy', $post['id']) }}" method="POST">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-primary">Да</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @foreach ($gallery as $category)
                                            <div class="modal fade" id="h{{$category['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <a href="{{route('gallery.show', $category['id'])}}" class="btn btn-primary">
                                                                Да
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    @endforeach
                                @endif






                            </div>
                        </div>
                    </div>

@endsection
