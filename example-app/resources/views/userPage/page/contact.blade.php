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
        <div class="offset"></div>
    <div class="white-wrapper">
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2231.388937338009!2d50.44523721530822!3d55.99461538078406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415f23a3073071d9%3A0x741bef279139179!2z0KLQkNCY0KQt0J3QmiDQkNCX0KEg4oSWNzEwICjQotCQ0KLQndCV0KTQotCV0J_QoNCe0JTQo9Ca0KIp!5e0!3m2!1sru!2sru!4v1673074739658!5m2!1sru!2sru" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- /.map-wrapper -->
    </div>

    <div class="light-wrapper">
    <div class="container inner">
        <div class="thin">
            <div class="section-title text-center">
                <h3>СВЯЗАТЬСЯ</h3>
                <p class="lead">Не стесняйтесь писать нам</p>
            </div>
            <ul class="contact-info text-center">
                <li><i class="icon-location"></i>422060, респ. Татарстан, пгт. Богатые Сабы, ул. Заводская, д. 19</li>
                <li><i class="icon-phone"></i>+7 927 039 71 17</li>
                <li><i class="icon-mail"></i><a href="mailto:sales@brankorus.ru">sales@brankorus.ru</a></li>
            </ul>
            <div class="divide50"></div>
            <div class="form-container">
                <form action="{{route('mail.store')}}" method="post" class="vanilla vanilla-form" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="text" name="name" placeholder="Ваше имя" required="required">
                                    <i class="icon-user"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="email" name="mail" placeholder="Электронная почта" required="required">
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
                                    <i class="icon-ok"></i><span><!-- fake select handler --></span> </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <textarea name="text" placeholder="Напишите Ваше сообщение сюда..."></textarea>

                    <!--/.radio-set -->
                    <input type="submit" class="btn" value="Отправить" data-error="Fix errors" data-processing="Sending..." data-success="Thank you!">
         
                </form>
                <!--/.vanilla-form -->
            </div>
            <!--/.form-container -->

        </div>
        <!-- /.container -->
    </div>
     @endsection