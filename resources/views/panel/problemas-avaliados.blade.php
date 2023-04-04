<x-layout title="Questões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Problemas / Barreiras de Acessibilidade Avaliadas </h6>
              </div>
            </div>            

            <!--
            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de problemas cadastrados: {{App\Http\Controllers\IssueController::countIssueView()}} 
              </h6>
            </div>
            -->

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do Problema</th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Dispositivo </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Aplicativo </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Padrão<br />de Acessibilidade </th>    
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Total<br /> de Avaliações </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Avaliações <br /> Realizadas </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Percentual </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> &nbsp; </th>                                              
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($issues as $issue)                   
                    <tr>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm"> {{$issue->title}} </h6></div> </td>                         
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->device}} </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->appTitle}} </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> padrão </h6> </div></td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm" style="font-weight:500;"> {{$issue->total}} </h6> </div> </td>
                      <td>                        
                        <span style="color:#F44335;margin:0px 10px;font-weight:500;"> 
                          Sim: {{$issue->yes}}                            
                        </span>                                                
                        
                        <span style="color:#4CAF50;font-weight:500;"> 
                        Não: {{$issue->no}}
                        </span>                        
                      </td>                      
                      <td>
                      <span style="color:#F44335;margin:0px 10px;font-weight:500;"> 
                          {{number_format($issue->yes/$issue->total * 100,0)}}%                            
                        </span>                                                
                        
                        <span style="color:#4CAF50;font-weight:500;"> 
                          {{number_format($issue->no/$issue->total * 100,0)}}%                            
                        </span>         
                      </td>
                      <td>
                        <a href="/problema-detalhado/{{$issue->id}}" title="Mais detalhes sobre o problema" class="btn btn-info " style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>                                                 
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


  
</x-layout>