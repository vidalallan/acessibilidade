<x-layout title="Dashboard">

    <div class="container-fluid py-4">
      <!-- Count Add -->
      <div class="row">

       
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div style="background-image: linear-gradient(195deg, #7c0cbf 0%, #7e49e3 100%);"
                   class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">quiz</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize"> Problemas </p>
                <h4 class="mb-0">{{App\Http\Controllers\IssueController::countIssueView()}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">
                  {{App\Http\Controllers\IssueController::countIssueView()}}
                </span>
                problemas adicionados
              </p>
            </div>
          </div>
        </div>
       

       
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10"> note_add </i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Avaliações</p>
                <h4 class="mb-0"> {{App\Http\Controllers\AssessmentController::countAssessmentView()}} </h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">
                  {{App\Http\Controllers\AssessmentController::countAssessmentView()}} 
                </span>avaliações realizadas
              </p>
            </div>
          </div>
        </div>
       

       
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Usuários</p>
                <h4 class="mb-0"> {{App\Http\Controllers\UserController::countUserView()}} </h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">
                  {{App\Http\Controllers\UserController::countUserView()}}
                </span>
                usuários cadastrados
              </p>
            </div>
          </div>
        </div>
       

       
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10"> phone_iphone </i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Dispositivos</p>
                <h4 class="mb-0"> {{App\Http\Controllers\DeviceController::countDeviceView()}} </h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">
                  {{App\Http\Controllers\DeviceController::countDeviceView()}}  
                 </span> dispositivos cadastrados </p>
            </div>
          </div>
        </div>
      </div>
      

      <!-- Gráficos -->
      
      <div class="row mt-4">
        

        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1" style="background:#fff;">
                  <h6 style="color:#212529 ;padding-left:20px;"> Problemas por nível de gravidade </h6>                  
                  <div class="chart" style="height: 200px;">                      
                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                  </div>
              </div>
            </div>
            <div class="card-body">  
              <!--            
              <a href="/relatorio-nivel-gravidade"> Problemas por Nível de Gravidade  </a> 
              <br />
              <a href="/relatorio-nivel-gravidade"> Problemas com pelo menos uma avaliação </a>
              <br />
              <a href="/problemas-frequentes"> Problemas mais frequentes e menos frequentes </a>
              <hr class="dark horizontal">
              -->
              <div class="d-flex ">                
                <i class="material-icons opacity-10"> quiz </i>
                <a href="/relatorio-nivel-gravidade">                
                  <p class="mb-0 text-sm"> Problemas por Nível de Gravidade </p>
                </a>                  
              </div>              
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="background:#f56565;">              
                <h6 style="color: #fff;padding-left:10px;"> Problemas por nível de gravidade </h6>
                <div class="chart" style="height: 200px;">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <!-- <h6 class="mb-0 ">Total de Avaliações por Nível de Gravidade </h6> -->
              <!--
              <a href="/relatorio-nivel-gravidade"> Problemas por Nível de Gravidade  </a> 
              <br />
              <a href="/relatorio-nivel-gravidade"> Problemas com pelo menos uma avaliação </a>
              <br />
              <a href="/problemas-frequentes"> Problemas mais frequentes e menos frequentes </a>
              <hr class="dark horizontal">
              -->
              <div class="d-flex ">                
                <i class="material-icons opacity-10"> quiz </i>                
                <a href="/problemas-avaliados">  
                  <p class="mb-0 text-sm"> Problemas com pelo menos uma avaliação </p>
                </a>                  
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-dark border-radius-lg py-3 pe-1">
                <h6 style="color:#fff;padding-left:10px;"> Guias de acessibilidade mais citados </h6>
                <div class="chart" style="height: 200px;">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- <h6 class="mb-0 ">Total de Avaliações por Nível de Gravidade </h6> -->
              <!--
              <a href="/relatorio-nivel-gravidade"> -  </a> 
              <br />
              <a href="/relatorio-nivel-gravidade"> - </a>
              <br />
              <a href="/problemas-frequentes"> - </a>
              <hr class="dark horizontal">
              -->
              <div class="d-flex ">                
                <i class="material-icons opacity-10"> quiz </i>
                <a href="/problemas-frequentes">
                  <p class="mb-0 text-sm"> Problemas mais frequentes e menos frequentes </p>
                </a>                  
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Fim Gráficos -->

      <!--
      <div class="card-body pt-4 pb-3">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
               <p>
                <a href="/problemas"> Visualizar todos problemas cadastrados </a>   
               
                <a href="/relatorio-nivel-gravidade"> Problemas por Nível de Gravidade  </a> 
                  
                <a href="/problemas-avaliados"> Problemas com pelo menos uma avaliação </a>
                
                <a href="/problemas-frequentes"> Problemas mais frequentes e menos frequentes </a>                 
              </p>
                
              </div>  
            </div>  
          </div>    
        </div>  
      </div>
      -->


      <br />

      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6 style="color: #7e49e3;"> Problemas </h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">
                      Top 10 dos Problemas / barreiras com mais avaliações realizadas.
                    </span> 
                  </p>
                </div>                
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Nº </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total <br />de Avaliações</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> 
                        Das Avaliações Realizadas:
                        <br /> Sim - avaliaram que é um problema
                        <br /> Não - avaliaram que não é um problema
                        <br /> Não têm certeza se é um problema
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Ações </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($issues as $issue)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <h6 class="mb-0 text-sm"> <?php echo $i; ?>  </h6>
                          </div>                          
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm" style="color: #7e49e3;"> {{$issue->problemTit}} </h6>
                          </div>
                        </div>
                      </td>                      
                      
                      <td class="align-middle">
                      <div class="avatar-group mt-2">
                          <h5 class="mb-0 text-sm text-center"> 
                            <span class="font-weight-bold" style="color: #7e49e3;"> 
                              {{$issue->total}} 
                            </span> 
                          </h5>
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="text-center">
                          <h6 class="mb-0 text-sm text-center">
                            <span class="text-center" style="color:#F44335;margin:0px 10px;font-weight:500;"> 
                              Sim: {{$issue->yes}}                            
                            </span>                                                
                              
                            <span class="text-center" style="color:#4CAF50;margin:0px 10px;font-weight:500;"> 
                              Não: {{$issue->no}}
                            </span>

                            <span class="text-center" style="color:#0a1d83;font-weight:500;"> 
                              Não têm certeza: {{$issue->noSure}}
                            </span>
                          </h6>
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="text-center">
                          <a href="/problemas-filtrar?searchBy=1&searchField={{$issue->problemTit}}" title="Mais detalhes sobre o problema" class="btn btn-info " style="padding: 5px 10px;">
                            <p class="text-xs font-weight mb-0">
                              Visualizar problemas
                            </p>                        
                          </a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>




        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6> Aplicações com mais problemas cadastrados </h6>               
              <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">
                  Top 10 das Aplicações com mais problemas cadastrados.
                </span> 
              </p>                           
            </div>
            
            <div class="card-body p-3">
            <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Nº </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aplicativo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total <br />de Avaliações</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Ações </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($issuesApp as $issue)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <h6 class="mb-0 text-sm"> <?php echo $i; ?>  </h6>
                          </div>                          
                        </div>
                      </td>
                      
                      
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> {{$issue->appTitle}} </span>
                      </td>
                      <td class="align-middle">
                      <div class="avatar-group mt-2">
                          <h5 class="mb-0 text-sm text-center"> 
                            <span class="font-weight-bold" style="color: #7e49e3;"> 
                              {{$issue->total}} 
                            </span> 
                          </h5>
                        </div>
                      </td>
                      
                      <td class="align-middle">
                        <div class="text-center">
                          <a href="/problemas-filtrar?searchBy=3&searchField={{$issue->appTitle}}" title="Mais detalhes sobre o problema" class="btn btn-info " style="padding: 5px 10px;">
                            <p class="text-xs font-weight mb-0">
                              Visualizar Problemas
                            </p>                        
                          </a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
     
    </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");
    
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          @foreach($severityLevelGroup as $aa)            
              "{{$aa->severity}}",
            @endforeach
        ],
        datasets: [{
          label: "Total",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data:[             
            @foreach($severityLevelGroup as $aa)            
              {{$aa->total}},
            @endforeach
          ],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "pie",
      data: {        
        labels: [
          @foreach($pieChart as $aa)            
              "{{$aa->severity}}",
            @endforeach
        ],

        datasets: [{
          label: "",          
          tension: 0,
          borderWidth: 0,
         // pointRadius: 5,
          //pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",          
          //borderColor: "rgba(255, 255, 255, .8)",
         // borderWidth: 4,
          //backgroundColor: "transparent",
          backgroundColor: [ 
            @foreach($pieChart as $aa)            
              '{{$aa->severityColor}}',
            @endforeach],
          fill: false,
          data: [
            @foreach($pieChart as $aa)            
              {{$aa->total}},
            @endforeach
          ],
          maxBarThickness: 4

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: true,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
              //color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: false,
              //color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: false,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      //type: "line",
      type: "bar",
      data: {
        labels: [
          @foreach($patternChart as $aa)            
              "{{$aa->pattern}}",
            @endforeach
        ],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [
            @foreach($patternChart as $aa)            
              "{{$aa->total}}",
            @endforeach
          ],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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



</x-layout>