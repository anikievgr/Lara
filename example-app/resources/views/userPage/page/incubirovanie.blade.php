@extends('../../userPage/app')
@section('title')
    Branko -  Инкубирование
 @endsection
 @if ($title == [])
 @section('navBar-tag')
        <nav class="navbar navbar-default default solid">
            @endsection
     @endif
@section('activpage')
                        <li class="/">
                        <a href="/">О нас</a>
                    </li>
                    <li class="current">
                        <a href="/incubirovanie">Инкубирование</a>
                    </li>
                    <li class="/">
                        <a href="/contact">Контакты</a>
                    </li>
     @endsection
@section('content')
@if ($title!= [])
    

     <div class="post-parallax parallax inverse-wrapper parallax3" style="background-image: url({{asset('/storage/'. $title[0]['image'])}}">
        <div class="container inner text-center">
            <h2>{{$title[0]['title']}}</h2>

        </div>
    </div>
    @endif
    
    @if ($text != [] )
          
              
    <div class="container inner">
        <div class="headline text-center">
            <h2>Инкубирование</h2>
           
        </div>
        <div class="divide30"></div>
        <div class="row services">
            
          @foreach ($text as $item)
                
           
            <div class="col-sm-6">
                <div class="service">
                    <h4 style="text-align: center;">{{$item['title']}}</h4>
                    <p style="text-align: center;">{{$item['text']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif  
     @endsection
 

