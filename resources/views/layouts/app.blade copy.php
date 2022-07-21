
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Uncensored crypto social network - last.today') }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='http://onesignal.github.io/emoji-picker/lib/css/emoji.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    @yield('head')
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/style.css" rel="stylesheet" type="text/css"/>

    <script>
    $(document).ready(function(){
        // // Open modal on page load
        // $(".modal").modal('show');
 
        // Close modal on button click
        $(".btn").click(function(){
            $("#allcontents").modal('hide');
        });
    });
</script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeoLUMgAAAAAKTPIh3_35m7BLWTjiLr6GwNoEIo"></script>
<script>
    grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute('6LeoLUMgAAAAAKTPIh3_35m7BLWTjiLr6GwNoEIo', {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>

</head>
<body class="Profile"  style="
@if(empty(preg_match('/ajaxview/i',url()->current())))

@if(Request::route('username'))
@php 
$backgroundimage = '/'.Helper::find_user_by_username(Request::route('username'))->backgroundimage;
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

@endif


">
<div>


<div id="ltmenu">
<div class="container">
  @include('menu')
</div></div>


    <div class="container-fluid">
        
     @include('layouts.nav')
        <div class="container" id="app">
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
@yield('content')





            </div>
            </div>
        </div>
    </div>


    @include('layouts.modals')

</div>
</div>


 <script>
             
//upload files
const INPUT_FILE = document.querySelector('#upload-files');
const INPUT_CONTAINER = document.querySelector('#upload-container');
const FILES_LIST_CONTAINER = document.querySelector('#files-list-container');
const FILE_LIST = [];
let UPLOADED_FILES = [];

const multipleEvents = (element, eventNames, listener) => {
  const events = eventNames.split(' ');

  events.forEach(event => {
    element.addEventListener(event, listener, false);
  });
};

const previewImages = () => {
  FILES_LIST_CONTAINER.innerHTML = '';
  if (FILE_LIST.length > 0) {
    FILE_LIST.forEach((addedFile, index) => {
      const content = `
        <div class="form__image-container js-remove-image" data-index="${index}">
          ${addedFile.name}
        </div>
      `;

      FILES_LIST_CONTAINER.insertAdjacentHTML('beforeEnd', content);
    });
  } else {
    console.log('empty');
    INPUT_FILE.value = "";
  }
};

const fileUpload = () => {
  if (FILES_LIST_CONTAINER) {
    multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
      INPUT_CONTAINER.classList.add('active');
    });

    multipleEvents(INPUT_FILE, 'dragleave dragend drop change blur', () => {
      INPUT_CONTAINER.classList.remove('active');
    });

    INPUT_FILE.addEventListener('change', () => {
      const files = [...INPUT_FILE.files];
      console.log("changed");
      files.forEach(file => {
        const fileURL = URL.createObjectURL(file);
        const fileName = file.name;

          const uploadedFiles = {
            name: fileName,
            url: fileURL };


          FILE_LIST.push(uploadedFiles);
       
      });

      console.log(FILE_LIST); //final list of uploaded files
      previewImages();
      UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
      removeFile();
    });
  }
};

const removeFile = () => {
  UPLOADED_FILES = document.querySelectorAll(".js-remove-image");

  if (UPLOADED_FILES) {
    UPLOADED_FILES.forEach(image => {
      image.addEventListener('click', function () {
        const fileIndex = this.getAttribute('data-index');

        FILE_LIST.splice(fileIndex, 1);
        previewImages();
        removeFile();
      });
    });
  } else {
    [...INPUT_FILE.files] = [];
  }
};

fileUpload();
removeFile();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/SwitchTheme.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28608110-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-28608110-3');
</script>

@include('layouts.script')
@yield('page_scripts')
<script src="/assets/js/app.js"></script>
<script src="/script.js"></script>
</body>
</html>