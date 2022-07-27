<!doctype html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('head')
    <link href="/style.css" rel="stylesheet" type="text/css"/>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body class="bg-light">
    
<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
       
        <li class="nav-item">
          <a class="nav-link" href="mailto:farshidm917@gmail.com">Contact</a>
        </li>
       
      </ul>
      
      <form class="d-flex" action="/zs/post" method="POST">
                    @csrf
                        <div class="search-icon">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 21.5 21.5">
                                <path d="M11.5,1.25A10.25,10.25,0,1,0,21.75,11.5,10.26,10.26,0,0,0,11.5,1.25Zm0,19a8.75,8.75,0,1,1,8.75-8.75A8.76,8.76,0,0,1,11.5,20.25Z"
                                      transform="translate(-1.25 -1.25)"></path>
                                <path d="M22.53,21.47l-2-2a.75.75,0,0,0-1.06,1.06l2,2a.75.75,0,0,0,1.06,0A.75.75,0,0,0,22.53,21.47Z"
                                      transform="translate(-1.25 -1.25)"></path>
                            </svg>
                        </div>
                        <input class="form-control search-form-control me-2" type="text" placeholder="Type + Enter" aria-label="Search" name="zoomsearch" id="zoomsearch" autocomplete="off">
                     
                    </form>
    </div>
  </div>
</nav>



<main class="container">
  @yield('content')
</main>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28608110-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-28608110-1');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script src="/script.js"></script>
  </body>
</html>
