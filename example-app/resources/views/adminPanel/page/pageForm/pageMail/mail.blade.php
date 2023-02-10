@extends('../adminPanel/app')
 @section('mail')  <li class='menu active' > @endsection
@section('headerAddLink')
<link href="{{asset('assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/plugins/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/pageAdmin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('style/pageAdmin/assets/css/apps/mailbox.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('style/pageAdmin/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{asset('style/pageAdmin/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    @show
@section('scriptAdd')
<script src="{{asset('style/pageAdmin/assets/js/ie11fix/fn.fix-padStart.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/editors/quill/quill.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/assets/js/apps/custom-mailbox.js')}}"></script>
   @endsection
@section('content')
 <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12">
@if ($mail == [])
                                   <div class="card component-card_1">
                                        <div class="card-body">
                                            <p class="card-text">На данный момент писем нет</p>
                                        </div>
                                    </div>
                             @else
                        <div class="row">

                            <div class="col-xl-12  col-md-12">


                                <div class="mail-box-container">
                                    <div class="mail-overlay"></div>

                                    <div class="tab-title" style="display: none">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                                                <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                                <div class="mail-sidebar-scroll">

                                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span class="nav-names">Inbox</span> <span class="mail-badge badge"></span></a>
                                                        </li>


                                                    </ul>



                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="mailbox-inbox" class="accordion mailbox-inbox">



                                        <div class="action-center">

                                            <div class="">

                                                <div class="dropdown d-inline-block more-actions">


                                                <div class="n-chk" style="display: none">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" id="inboxAll">
                                                      <span class="new-control-indicator"></span><span>Выбрать все</span>
                                                    </label>
                                                </div>



                                                    <a class="dropdown-item action-delete" href=""data-toggle="modal" data-target="#dAll">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Удалить все
                                                        </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-actions-btns-dropdown">


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="message-box">

                                            <div class="message-box-scroll" id="ct">
                                                @foreach ($mail as $item)


                                                <div  class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEleven">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#q{{$item['id']}}" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">


                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="{{$item['mail']}}">{{$item['name']}}</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="meta-time align-self-center">{{$item['theme']}}</p>
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"{{$item['text']}}\n"}]}'><span class="mail-title" data-mailTitle=""></span> {{$item['text']}}</p>
                                                                                <p class="meta-time align-self-center">{{date('d M', strtotime($item['created_at'] ))}}</p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="content-box">
                                            <div class="d-flex msg-close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                                <h2 class="mail-title" data-selectedMailTitle=""></h2>
                                            </div>





                                           @foreach ($mail as $item)



                                            <div id="q{{$item['id']}}" class="collapse" aria-labelledby="mailHeadingEleven" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="kirsten.beck@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">

                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Verification Link">{{$item['name']}}</h4>

                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="{{$item['mail']}}">{{$item['mail']}}</p>
                                                                    <p class="meta-time align-self-center">{{ date('d M', strtotime($item['created_at'] ))}}</p>
                                                                </div>
                                                                <p class="meta-time align-self-center">Тема - {{$item['theme']}}</p>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <p>{{$item['text']}}</p>


                                                        <p  >{{$item['name']}}</p>
                                                    @if($item['theme'] == 'Сотрудничество')
                                                    <div class="position-absolute ">
                                                        <a href="{{route('mailAdd.show', $item['id'] )}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <div class="compose-box">
                                                    <div class="compose-content">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex mb-4 mail-form">
                                                                        <p>From:</p>
                                                                        <select class="" id="m-form">
                                                                            <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                                                                            <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="d-flex mb-4 mail-to">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                                        <div class="">
                                                                            <input type="email" id="m-to" placeholder="To" class="form-control">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="d-flex mb-4 mail-cc">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                                        <div>
                                                                            <input type="text" id="m-cc" placeholder="Cc" class="form-control">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex mb-4 mail-subject">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                                <div class="w-100">
                                                                    <input type="text" id="m-subject" placeholder="Subject" class="form-control">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple">
                                                            </div>

                                                            <div id="editor-container">

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="btn-save" class="btn float-left"> Save</button>
                                                <button id="btn-reply-save" class="btn float-left"> Save Reply</button>
                                                <button id="btn-fwd-save" class="btn float-left"> Save Fwd</button>

                                                <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

                                                <button id="btn-reply" class="btn"> Reply</button>
                                                <button id="btn-fwd" class="btn"> Forward</button>
                                                <button id="btn-send" class="btn"> Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endif

                        </div>

                    </div>
                </div>

                </div>

                                        <div id="dAll" class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content p-1">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Вы точно хотите удалить ВСЕ ЗАПИСИ?</h4>
                                                    </div>
                                                    <a href="{{route('mail.show','all')}}" class="btn btn-primary mb-2">Да</a>
                                                </div>
                                            </div>
                                        </div>
        </div>

 @endsection
