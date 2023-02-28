<div class="header-container fixed-top ">
    <header class="header navbar navbar-expand-sm d-flex justify-content-between" >
        <a  href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row">
            <li class="nav-item align-self-center page-heading">
                <div class="page-header">
                    <div class="page-title">
                        <h3>@section('name')
                                Продукты
                            @show</h3>
                    </div>
                </div>
            </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}" class="formLog">
            @csrf
            <button type="submit" class="log_out">
                {{ __('Выход') }}
            </button>
        </form>
    </header>
</div>
