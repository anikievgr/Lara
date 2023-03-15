@extends('../userPage/app')
@section('title')
    Branko -  Контакты
@endsection
@section('activpage')
    <li class="">
        <a href="/">О нас</a>
    </li>
    <li class="">
        <a href="/incubirovanie">Инкубирование</a>
    </li>
    <li class="current">
        <a href="/contact">Контакты</a>
    </li>
@endsection
@section('navBar-tag')
    <nav class="navbar navbar-default default solid">
        @endsection
        @section('content')
            @if($map['href'] != null)
                <div class="offset"></div>
                <div class="white-wrapper">
                    <div class="map-wrapper">
                        <iframe src={{$map['href']}} width="100%" height="460" frameborder="0" style="border:0"
                                allowfullscreen></iframe>
                    </div>
                    <!-- /.map-wrapper -->
                </div>
            @endif
            <div class="light-wrapper">
                <div class="container inner">
                    <div class="thin">
                        <div class="section-title text-center">
                            <h3>СВЯЗАТЬСЯ</h3>
                            <p class="lead">Не стесняйтесь писать нам</p>
                        </div>
                        <ul class="contact-info text-center">
                            <li><i class="icon-location"></i>422060, респ. Татарстан, пгт. Богатые Сабы, ул. Заводская,
                                д. 19
                            </li>
                            <li><i class="icon-phone"></i>+7 927 039 71 17</li>
                            <li><i class="icon-mail"></i><a href="mailto:sales@brankorus.ru">sales@brankorus.ru</a></li>
                        </ul>
                        <div class="divide50"></div>
                        <div class="form-container">
                            <form action="{{route('mail.store')}}" method="post" class="vanilla vanilla-form"
                                  novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-field ">
                                            <label class="">
                                                <input type="text" @if($errors->has('name')) style="border: 1px solid red" @endif class="" name="name" placeholder="Ваше имя"
                                                       required="required " value="{{old('name')}}">
                                                <i class="icon-user"></i></label>


                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <label>
                                                <input @if($errors->has('mail')) style="border: 1px solid red" @endif type="email" name="mail" placeholder="Электронная почта"
                                                       required="required" value="{{old('mail')}}">
                                                <i class="icon-mail-alt"></i></label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <label>
                                                <input  @if($errors->has('telephone')) style="border: 1px solid red" @endif type="tel" name="telephone" placeholder="Телефон" value="{{old('telephone')}}">
                                                <i class="icon-phone"></i></label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field" >
                                            <label class="custom-select"  >
                                                <select name="theme" required="required" @if($errors->has('theme')) style="border: 1px solid red" @endif>
                                                    <option value="">Выберите тему</option>
                                                    <option @if(old('theme') == 'Sales') selected @endif value="Sales">Сотруднечиство</option>
                                                    <option @if(old('theme') == 'Marketing') selected @endif  value="Marketing">Поддержка</option>
                                                </select>
                                                <i class="icon-ok"></i><span><!-- fake select handler --></span>
                                            </label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                                <textarea name="text" placeholder="Напишите Ваше сообщение сюда...">{{old('text')}}</textarea>
                                @if($errors->has('text') || $errors->has('theme') || $errors->has('mail') || $errors->has('telephone') || $errors->has('name') )
                                    <div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Ошибка! </strong> Убедитесь, что все поля заполнены</div>
                                @endif
                                <!--/.radio-set -->
                                <input type="submit" class="btn" value="Отправить" data-error="Fix errors"
                                       data-processing="Sending..." data-success="Thank you!">

                            </form>
                            <!--/.vanilla-form -->
                        </div>
                        <!--/.form-container -->

                    </div>
                    <!-- /.container -->
                </div>
@endsection
