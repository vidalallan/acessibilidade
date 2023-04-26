<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    {{$title}}
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
  
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet"/>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
      setTimeout(function(){
        $(".alert-success").fadeOut("slow",function(){
          $(this).alert('close');
        });
      },2000);
    });    
  </script>
  
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">

        <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white text-center"> Accessibility Cases</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- <a class="nav-link text-white active bg-gradient-primary" href="/dashboard"> -->
          <a class="nav-link text-white" href="/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/avaliacoes">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">note_add</i>
            </div>
            <span class="nav-link-text ms-1"> Avaliações </span>
          </a>
        </li>

        @AdminOnly
        <li class="nav-item">
          <a class="nav-link text-white" href="/dispositivos">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              
            <i class="fas fa-mobile-android-alt"></i>
            <i class="material-icons opacity-10"> phone_iphone </i>
              
            </div>
            <span class="nav-link-text ms-1">Dispositivos</span>
          </a>
        </li>  
        @endAdminOnly
        
        @AdminOnly
        <li class="nav-item">
          <a class="nav-link text-white" href="/padroes">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">pattern</i>
            </div>
            <span class="nav-link-text ms-1"> Padrões </span>
          </a>
        </li>     
        @endAdminOnly   
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Problemas</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/problemas-adicionar">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"> quiz </i>
            </div>
            <span class="nav-link-text ms-1"> Adicionar Problema </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/problemas">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"> quiz </i>
            </div>
            <span class="nav-link-text ms-1"> Problemas </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/problemas-avaliados">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"> search </i>
            </div>
            <span class="nav-link-text ms-1"> Pesquisar Problemas </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/problemas-avaliados">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"> quiz </i>
            </div>
            <span class="nav-link-text ms-1"> Problemas Avaliados </span>
          </a>
        </li>        
        
              
        @AdminOnly
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Páginas dos Usuários</h6>
        </li>
        @endAdminOnly

        @AdminOnly
        <li class="nav-item">
          <a class="nav-link text-white " href="/usuarios">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Usuários</span>
          </a>
        </li>
        @endAdminOnly        
        <li class="nav-item">
          <a class="nav-link text-white " href="/logout">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Sair</span>
          </a>
        </li>
      </ul>
    </div>    
  </aside>  



  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          
          <!-- <h6 class="font-weight-bolder mb-0"> {{$title}} </h6> -->
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
            
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-flex align-items-center">
              <a href="/logout" class="nav-link text-body font-weight-bold px-0">
                
                <i class="fa fa-sign-out me-sm-1" aria-hidden="true" style="color:#000;"></i>
                <span class="d-sm-inline d-none" style="color:#000;">Sair</span>
              </a>
            </li> 
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">                  
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar --> 

 
  {{$slot}}


  <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
              <p style="color:#000;">
                © <script>
                  document.write(new Date().getFullYear())
                </script> - 
                 Todos os direitos reservados.
                </p>
              </div>
            </div>            
          </div>
        </div>
      </footer>
    </div>

</main>  
  
</body>

</html>

<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>