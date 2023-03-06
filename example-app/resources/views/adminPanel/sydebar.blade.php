<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-text">
                <a href="/" class="nav-link"> Админ-панель </a>
            </li>
            <li class="nav-item toggle-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather sidebarCollapse feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </li>
        </ul>
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">

                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>corck</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="submenu list-unstyled collapse" id="dashboard" data-parent="#accordionExample">
                    <li class=
                    @section('Analytics')
                        @show>
                        <a href="{{route('analytics.index')}}"> Analytics </a>
                    </li>
                    <li class=
                    @section('Sales')
                        @show>
                        <a href= {{route('sales.index')}}> Sales </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>APPS</span></div>
            </li>

            @section('Chat')  <li class='menu' > @show
                <a href="/chat" aria-expanded="false" class="dropdown-toggle">
                    <div class= "">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <span>Chat</span>
                    </div>
                </a>
            </li>
            @section('mail')  <li class='menu' > @show
                <a href="{{route('mail.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span>Письма</span>
                    </div>
                </a>
            </li>
            @section('users')  <li class='menu' > @show
                <a href="{{route('tableusers.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Пользователи</span>
                    </div>
                </a>
            </li>
            @section('product')  <li class='menu' > @show
                <a href="{{route('tableproducts.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>                                <span>Продукты</span>
                    </div>
                </a>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>TABLES AND FORMS</span></div>
            </li>

            <li class='menu ' >

                <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Главная страница</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="forms" data-parent="#accordionExample">
                    <li class = @section('sliderForm')@show>
                        <a href="{{route('slider.index')}}">Слайдер</a>
                    </li>
                    <li class = @section('galerea')@show>
                        <a href="{{route('gallery.index')}}"> Галерея</a>
                    </li>
                    <li class = @section('news')@show>
                        <a href="{{route('news.index')}}"> Новости</a>
                    </li>
                    <li class = @section('ocompany')@show>
                        <a href="{{route('company.index')}}"> О компании</a>
                    </li>
                    <li class = @section('process')@show>
                        <a href="{{route('process.index')}}"> Процессы </a>
                    </li>
                    <li class = @section('title')@show>
                        <a href="{{route('text.index')}}"> Текст </a>
                    </li>
                    <li class = @section('video')@show>
                        <a href="{{route('video.index')}}"> Видео </a>
                    </li>
                    <li class = @section('image')@show>
                        <a href="{{route('image.index')}}">Картинка </a>
                    </li>
                </ul>

            </li>
            <li    class='menu' >

                <a href="#incubirovane" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Инкубирование</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="incubirovane" data-parent="#accordionExample">
                    <li class = @section('incubitovanieHeader')@show>
                        <a href="{{route('header.index')}}"> Header</a>
                    </li>
                    <li class = @section('incubitovanieText')@show>
                        <a href="{{route('textI.index')}}"> Текст</a>
                    </li>
                </ul>

            </li>


            <li class="menu">

                <a href="#shop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Магазин</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="submenu list-unstyled collapse" id="shop" data-parent="#accordionExample">
                    <li class=
                    @section('products')
                        @show>
                        <a href="{{route('shop.index')}}"> Продукты </a>
                    </li>
                    <li class=
                    @section('orders')
                        @show>
                        <a href="{{route('order.index')}}"> Заказы </a>
                    </li>
                    <li class=
                    @section('trueOrder')
                        @show>
                        <a href="{{route('trueOrder.index')}}">Доставленные </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

</div>
