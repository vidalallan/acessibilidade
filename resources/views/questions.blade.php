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
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Cadastro de possíveis problemas de acessibilidade
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<style>
 
</style>

<body class="bg-gray-200">

  <!-- Menu da parte do usuário -->
  <x-menu-usuario />

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" >

    <div class="container-fluid py-7">
      <div class="row">
        <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);max-width: 68%;">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Cadastre sua questão de acessibilidade </h6>
              </div>
            </div>

            <div class="card-body pt-4 pb-3">                                

              <form role="form" class="text-start" action="/questoes" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="title" placeholder="Título do problema">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="description" placeholder="Descrição do problema">
              </div>

              <div class="input-group input-group-outline my-3">                    
                
                <select class="form-control" name="idPattern">
                        <option value="0"> Escolha um padrão de acessibilidade </option>
                        @foreach($patterns as $pattern)                                    
                            <option value="{{$pattern->idPattern}}"> {{$pattern->pattern}} </option>                           
                                            
                        @endforeach                        
                    </select>  
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="patternVersion" placeholder="Versão do Padrão">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="patternVersionDetailts" placeholder="Detalhes da Versão do Padrão (categoria, regra etc)">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="appTitle" placeholder="Nome do Aplicativo">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="appFieldId" placeholder="Id do Campo do Aplicativo">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="appFieldName" placeholder="Nome do Campo do Aplicativo">
              </div>           
              
              <div class="input-group input-group-outline my-3">                                    
                <input type="file" title="Print da Tela do Aplicativo" name="printScreen" class="form-control inputFileHidden" id="" />
              </div>              
              
              <div class="input-group input-group-outline my-3">                                    
                <select class="form-control" name="idDevice">
                  <option value="0"> Escolha um dispositivo </option>
                  @foreach($devices as $device)                                    
                      <option value="{{$device->idDevice}}"> {{$device->device}} </option>
                  @endforeach                        
                </select>
              </div>
              
              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="devideModel" placeholder="Modelo do Dispositivo">
              </div>
              
              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="version" placeholder="Versão do Dispositivo">
              </div>

              <div class="input-group input-group-outline my-3">                    
                <input type="text" class="form-control" name="linkApp"  placeholder="Link do Aplicativo">
              </div>        
                                                  
              <div class="d-flex justify-content-end mb-3">
                <button type="submit" class="btn bg-gradient-info"> Salvar </button>
              </div>                  
            </form>              
          </div>           
            
          </div>
        </div>
      </div>

      
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script> 
                - Todos os direitos reservados.
              </div>
            </div>            
          </div>
        </div>
      </footer>
    </div>
  </main>
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
</body>

</html>