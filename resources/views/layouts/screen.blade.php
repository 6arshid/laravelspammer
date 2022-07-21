<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') - {{ config('app.name', 'Last.Today') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/style.css" rel="stylesheet" type="text/css"/>
</head>
<body  style="background-color: transparent;">
<div>

    <div class="container-fluid">

        <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-12 pt-5">
                            @yield('content')
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addvoice" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add new Voicd</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body text-center">
                  
                <input type="file" accept="audio/*" class="form-control">
                <hr>
                @include('content.addvoice')


    
                </div>
            </div>
        </div>
    </div>
    @include('layouts.modals')

</div>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/SwitchTheme.js"></script>
<script src="/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script src="/assets/js/easy.qrcode.min.js"></script>
<script src="/assets/js/app.js"></script>
@yield('page_scripts')
</body>
</html>