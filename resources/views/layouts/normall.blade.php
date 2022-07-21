<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') - {{ config('app.name', 'Uncensored crypto social network - last.today') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    @yield('head')
    <link href="/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>


</head>
<body class="Profile"  style="
@if(!empty(Request::route('username')) || !empty(Session::get('username')))
@php 
if(!empty(Session::get('username'))){
    $backgroundimage = '/'.Helper::find_user_by_username(Session::get('username'))->backgroundimage;

}else{
    $backgroundimage = '/'.Helper::find_user_by_username(Request::route('username'))->backgroundimage;

}
@endphp
background-image: url('{{$backgroundimage}}');  background-position: center center;
     background-repeat: no-repeat; 
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
     background-attachment: fixed;
@elseif(Auth::check() && !empty(Auth::user()->backgroundimage))
@php
$user_bg_page_all_page = '/'.Auth::user()->backgroundimage;
@endphp
background-image: url('{{$user_bg_page_all_page}}');  background-position: center center;
     background-repeat: no-repeat; 
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
     background-attachment: fixed;
@elseif(Auth::check() && empty(Auth::user()->backgroundimage))
background-image: url('/assets/img/MainBg3.jpg'); background-repeat: no-repeat;
  background-attachment: fixed;
@else
background-image: url('/assets/img/MainBg3.jpg'); background-repeat: no-repeat;
  background-attachment: fixed;
@endif

">
<div>




    <div class="container-fluid">
        
     @include('layouts.nav')
        <div class="container" >
            <div class="row justify-content-center">
               <div class="col-12 pt-5">
               @include('sweetalert::alert')
               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              {{toast('Error,you must write title !','error');}}
            @endforeach
        </ul>
    </div>
@endif
<div id='users'>
<section></section> 
</div>




@yield('content')
            </div>
            </div>
        </div>
    </div>


    @include('layouts.modals')

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="/assets/js/theme.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
<script src="/assets/js/SwitchTheme.js"></script>
<script src="/script.js"></script>
<script src="/assets/js/easy.qrcode.min.js"></script>
<script src="/assets/js/app.js"></script>

@yield('page_scripts')


<!-- <script>
     $('.owlmain-content .owl-carousel').owlCarousel({
        stagePadding: 50,
        loop: true,
        margin: 30,
        nav: true,
        navText: [
            // '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            // '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        navContainer: '.owlmain-content .custom-nav',
        responsive:{
            0:{
                items: 1
            },
            600:{
                items: 1
            },
            1000:{
                items: 1
            }
        }
    });
    </script> -->


   @include('layouts.script')
</body>
</html>