@extends('../../../adminPanel/app')
@section('name')
    Пользователи
@endsection
@section('users')  <li class='menu active' > @endsection
@section('scriptAdd')

 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
 <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
 <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/noUiSlider/nouislider.min.js')}}"></script>

    <script src="{{asset('style/pageAdmin/plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
    @endsection
@section('headerAddLink')

        <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/assets/css/forms/theme-checkbox-radio.css')}}">
        <link href="{{asset('style/pageAdmin/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('style/pageAdmin/assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">


                        <div class="searchable-items list">
                            <div class="items items-header-section">
                                <div class="item-content">
                                    <div class="">
                                        <h4>Имя</h4>
                                    </div>
                                    <div class="user-email">
                                        <h4>Почта</h4>
                                    </div>

                                    <div class="action-btn" data-toggle="modal" data-target="#all">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </div>
                                </div>
                            </div>


                            @foreach($users as $user)
                                <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <div class="user-meta-info">
                                            <p class="user-name" data-name="Linda Nelson">{{$user['name']}}</p>

                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="info-title">Email: </p>
                                        <p class="usr-email-addr" data-email="linda@mail.com">{{$user['email']}}</p>
                                    </div>

                                    @if($user['role'] != 1)
                                        <div class="action-btn"  data-toggle="modal" data-target="#d{{$user['id']}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus delete"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                        </div>
                                    @else
                                        <div class="action-btn"  data-toggle="modal" data-target="#d{{$user['id']}}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                                <div id="d{{$user['id']}}" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content p-1">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Вы точно хотите удалить пользователя?</h4>
                                            </div>
                                            <a href="{{route('tableusers.show',$user['id'])}}" class="btn btn-primary mb-2">Да</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="all" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content p-1">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Вы точно хотите удалить всех пользователей?</h4>
                                        </div>
                                        <a href="{{route('tableusers.show','all')}}" class="btn btn-primary mb-2">Да</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection
