<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-text">
                <a href="#" class="nav-link"> Магазин </a>
            </li>
            <li class="nav-item toggle-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather sidebarCollapse feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </li>
        </ul>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
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
                    @section('product')
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
    <form method="POST" action="{{ route('logout') }}" class="pl-25">
        @csrf

        <button type="submit" class="btn btn-primary h-1">
            {{ __('Выход') }}
        </button>
    </form>
</div>
