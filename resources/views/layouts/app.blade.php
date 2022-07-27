<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Segoe UI:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        @yield('head')
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/style.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion text-uppercase" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="/logo.png" width="24">
                </div>
                <!-- <div class="sidebar-brand-text mx-3">Best result<sup>1</sup></div> -->
                <div class="sidebar-brand-text mx-3">Best result</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="https://t.me/QaGErqhjhgf">
                    <i class="fas fa-info-circle fa-fw"></i>
                    <span>Contact for ads</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ads
            </div>
            <li class="nav-item">
            <a class="nav-link" href="https://babevpn.com?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Free VPN</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://danske.site?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Web agancy denmark</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://danskesite.com?ref=rs" tartargetger="_blank">
                    <i class="fas fa-fw fa-table"></i>
                    <span>wordpress site builder</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://farshid.dk?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Lave hjemmeside</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="https://phpfactory.dk?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Webudvikler</span></a>
            </li>

      
            <li class="nav-item">
            <a class="nav-link" href="https://wordpress.org/plugins/easy-form-builder?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Easy form builder</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://mr.today?ref=rs" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Mr.Today</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://khadivar.com?ref=rs" alt="طراح سایت ،برنامه نویس سایت" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Web Programmer,Web Designer</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <p class="text-center mb-2"><strong>Your ads in here</strong> </p>
                <a class="btn btn-success btn-sm" href="https://t.me/QaGErqhjhgf">Contact Us</a>
                <a class="btn btn-danger mt-2 btn-lg" href="/">Home</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Search -->
                    <form  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"  action="/zs/post" method="POST">
                    @csrf
                    <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Type + Enter" aria-label="Search" name="zoomsearch" id="zoomsearch" autocomplete="off"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

             

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

      

             

                    <!-- Content Row -->

                    <div class="row">

                    @yield('content')

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Best result 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="/js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="/js/demo/chart-pie-demo.js"></script> -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-28608110-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-28608110-1');
</script>
</body>

</html>