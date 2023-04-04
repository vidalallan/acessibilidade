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
                <h6 class="text-white text-capitalize ps-3"> Detalhes do problema </h6>
              </div>
            </div>

            <div class="card-body pt-4 pb-3"> 

            @foreach($issues as $issue)
            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5;">
                  <h5 class="title text-center" style="color:#F56565;margin-top: 12px;"> Título do Problema: {{$issue->title}} </h5>                                
                  <p class="text-center"> {{$issue->description}} </p>                  
                </div>
              </div>
            </div>

            <br />

            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5;">
                <h6 class="title"> Aplicativo </h5>                
                <p>  {{$issue->appTitle}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                <h6 class="title"> Id do Campo do Aplicativo  </h5>                
                <p>  {{$issue->appFieldId}}  </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                <h6 class="title"> Nome Campo   </h5>                
                <p> {{$issue->appFieldName}}  </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                  
                  <h6 class="title"> Link do Aplicativo </h5>                
                  <p> <a href="{{$issue->linkApp}}" target="_blank" style="color:#1A73E8;font-weight:300;"> Aplicativo {{$issue->appTitle}} </a> </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <h6 class="title">  Print da tela com problema </h5>                
                  <p> 
                    <a href="{{asset('storage/'.$issue->printScreen)}}" download style="color:#1A73E8;font-weight:300;"> Download </a>
                    &nbsp;&nbsp;
                    <a href="{{asset('storage/'.$issue->printScreen)}}" target="_blank" style="color:#1A73E8;font-weight:300;"> Visualizar </a> 
                  </p>
                </div>

              </div>
            </div>                        

            <br />

            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5;">
                  <h6 class="title"> Dispositivo  </h5>                
                  <p> {{$issue->device}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                  
                  <h6 class="title"> Modelo  </h5>                
                  <p> {{$issue->devideModel}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <h6 class="title"> Versão do SO  </h5>                
                  <p> {{$issue->version}} </p>
                </div>                                
              </div>
            </div>

            <br />

            <div class="container">
              <div class="row">
                  <div class="col-sm" style="background:#f0f2f5;">
                  <h6 class="title"> Padrão de Acessibilidade </h5>                
                  <p> {{$issue->pattern}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  
                <h6 class="title"> Versão do Padrão  </h5>                
                <p> {{$issue->patternVersion}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                 
                  <h6 class="title"> Detalhes do Padrão  </h5>                
                  <p> {{$issue->patternVersionDetailts}} </p>
                </div>                                

                <div class="col-sm" style="background:#f0f2f5;">                 
                  <h6 class="title"> Origin </h5>                
                  <p> {{$issue->origin}} </p>       
                </div>                                

              </div>
            </div>
          
            @endforeach
                  
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid ">
        <div class="row">
          <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);max-width: 68%;">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background-image: linear-gradient(195deg, #adb5bd 0%, #495057 100%);">
                  <h6 class="text-white ps-3 text-center"> Avalie o problema descrito acima </h6>
                </div>
              </div>
                    
                <div class="container">
                  <div class="row">
                    
                  <div class="card-body pt-4 pb-3">                                

                    <form role="form" class="text-start" action="/avaliar-problema" method="post">
                      @csrf
                      
                      <h6> Este é de fato um problema de acessibilidade no aplicativo? </h6>

                      <input type="hidden" name="idIssue" value="{{Request::segment(2)}}"/>

                      <div class="input-group input-group-outline my-3">
                          <p>
                            <input type="radio" name="problem" value="0" checked /> <span> NÃO </span>
                            <input type="radio" name="problem" value="1" style="margin-left:20px;" /> <span> SIM </span>
                          </p>
                      </div>

                      <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" placeholder="Justificar opção escolhida" name="justification" style="height:100px"></textarea>  
                      </div>

                      <div class="d-flex justify-content-end mb-3">
                        <button type="submit" class="btn bg-gradient-info"> Avaliar </button>
                      </div>
                    </form>


                </div>

              </div>
            </div>
          </div>
      </div>



      <div class="container-fluid ">
        <div class="row">
          <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);max-width: 68%;">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background-image: linear-gradient(195deg, #adb5bd 0%, #495057 100%);">
                  <h6 class="text-white ps-3 text-center"> Justificativas das avaliações realizadas </h6>
                </div>
              </div>
                    
                <div class="container">
                  <div class="row">
                    
                  <div class="table-responsive card-body pt-4 pb-3">

                    <div class="table-responsive card-body pt-4 pb-3">
                      <p class="">
                        <span style=""> Total de avaliações Realizadas: <span style="font-weight:500;"> @foreach($total as $t){{$t->yes + $t->no}} @endforeach </span> </span>                        
                        <span style="color:#F44335;margin:0px 10px;"> 
                          Total de avaliações com Sim: 
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)
                              {{$t->yes}} - 
                              <!-- {{$t->yes / ($t->yes + $t->no) *100}}% -->
                            @endforeach 
                          </span>
                        </span>                                                
                        
                        <span style="color:#4CAF50;"> 
                          Total de avaliações com NÃO: 
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)
                              {{$t->no}}
                              <!-- {{$t->no / ($t->yes + $t->no) *100}}%-->
                            @endforeach
                          </span>
                        </span> 
                      </p>

                      <p class="">                                                
                        <span style="color:#F44335;">                           
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)                              
                              Sim: {{$t->yes / ($t->yes + $t->no) *100}}%
                            @endforeach 
                          </span>
                        </span>                                                
                        <br />
                        <span style="color:#4CAF50;">                           
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)                              
                              Não: {{$t->no / ($t->yes + $t->no) *100}}%
                            @endforeach
                          </span>
                        </span> 
                      </p>
                    </div>


                    <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7">É um problema de acessibilidade?</th>
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Justificativa </th>                      
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($assessments as $a)                    
                      <tr>
                        <td>
                          <div class="d-flex px-3 py-1">                         
                            @if($a->problem == 0)
                              <h6 class="mb-0 text-sm" style="color:#4CAF50;"> <i class="material-icons opacity-10"> sentiment_very_satisfied </i> NÃO</h6>      
                            @else
                              <h6 class="mb-0 text-sm" style="color:#F44335;"> <i class="material-icons opacity-10"> mood_bad </i> SIM</h6>      
                            @endif                                                    
                          </div>
                        </td>

                        <td>
                          @if($a->justification == null)
                            -
                            @else
                              {{$a->justification}}  
                            @endif                                                    
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

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