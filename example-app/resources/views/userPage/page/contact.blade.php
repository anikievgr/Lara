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
                                        <div class="form-field">
                                            <label>
                                                <input type="text" name="name" placeholder="Ваше имя"
                                                       required="required">
                                                <i class="icon-user"></i></label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <label>
                                                <input type="email" name="mail" placeholder="Электронная почта"
                                                       required="required">
                                                <i class="icon-mail-alt"></i></label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <label>
                                                <input type="tel" name="telephone" placeholder="Телефон">
                                                <i class="icon-phone"></i></label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <label class="custom-select">
                                                <select name="theme" required="required">
                                                    <option value="">Выберите тему</option>
                                                    <option value="Sales">Сотруднечиство</option>
                                                    <option value="Marketing">Поддержка</option>
                                                </select>
                                                <i class="icon-ok"></i><span><!-- fake select handler --></span>
                                            </label>
                                        </div>
                                        <!--/.form-field -->
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                                <textarea name="text" placeholder="Напишите Ваше сообщение сюда..."></textarea>

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
