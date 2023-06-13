<x-layout title="Relatório dos problemas por nível de gravidade">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Relatório dos problemas por nível de gravidade </h6>
              </div>
            </div>            

            <!--<div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Dispositivos cadastrados: {{App\Http\Controllers\DeviceController::countDeviceView()}} 
              </h6>
            </div>-->

            <div class="card-body px-0 pb-2">

              <div class="card-body pt-4 pb-3">
                <form action="/query-filter" method="get">
                  <label> Pesquisar por: </label>
                  <select class="form-select form-select-lg" name="searchBy">
                    <option value="0"> Escolha uma das opções </option>                  
                    <option value="1"> Título do problema </option>
                    <option value="2"> Dispositivo </option>
                    <option value="3"> Aplicativo </option>
                    <option value="4"> Guia de Acessibilidade </option>                                        
                  </select>

                  <div class="input-group input-group-outline my-3">                    
                    <input type="text" class="form-control" name="searchField"  placeholder="Digite aqui a sua consulta">
                  </div>

                  <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn bg-gradient-info"> Pesquisar </button>
                  </div>
                </form> 
              </div>

              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Data</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Aplicativo</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título<br /> do Problema</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Dispositivo</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Guia<br /> de Acessibilidade</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Total<br /> de Avaliações</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Crítico </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Muito Alto </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Alto </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Médio</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Baixo</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Nenhum</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listProSevLev as $listProSev)                    
                    <tr>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm"> {{date( 'd/m/Y',strtotime($listProSev->creationDate))}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$listProSev->appTitle}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$listProSev->problem}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$listProSev->device}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$listProSev->pattern}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$listProSev->totalAvaliacoes}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">
                            @if($listProSev->totalCritico>0)                              
                              <h6 class="mb-0 text-sm" style="background:#a83032;padding:2px 10px;border-radius:5px;color:#fff;">{{$listProSev->totalCritico}} </h6>
                            @else
                              <h6 class="mb-0 text-sm">{{$listProSev->totalCritico}} </h6>
                            @endif                                                                                
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            @if($listProSev->totalMuitoAlto>0)                              
                              <h6 class="mb-0 text-sm" style="background:#c7161f;padding:2px 10px;border-radius:5px;color:#fff;">{{$listProSev->totalMuitoAlto}} </h6>
                            @else
                              <h6 class="mb-0 text-sm">{{$listProSev->totalMuitoAlto}} </h6>
                            @endif                            
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            @if($listProSev->totalAlto>0)                              
                              <h6 class="mb-0 text-sm" style="background:#f68221;padding:2px 10px;border-radius:5px;color:#fff;">{{$listProSev->totalAlto}} </h6>
                            @else
                              <h6 class="mb-0 text-sm">{{$listProSev->totalAlto}} </h6>
                            @endif                               
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">           
                            @if($listProSev->totalMedio>0)                              
                              <h6 class="mb-0 text-sm" style="background:#f2c800;padding:2px 10px;border-radius:5px;color:#000;">{{$listProSev->totalMedio}} </h6>
                            @else
                            <h6 class="mb-0 text-sm">{{$listProSev->totalMedio}} </h6>                                                    
                            @endif
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            @if($listProSev->totalBaixo>0)                              
                              <h6 class="mb-0 text-sm" style="background:#027e3f;padding:2px 10px;border-radius:5px;color:#fff;">{{$listProSev->totalBaixo}} </h6>
                            @else
                            <h6 class="mb-0 text-sm">{{$listProSev->totalBaixo}} </h6>                                                    
                            @endif
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            @if($listProSev->totalNenhum>0)                              
                              <h6 class="mb-0 text-sm" style="background:#09adeb;padding:2px 10px;border-radius:5px;color:#fff;">{{$listProSev->totalNenhum}} </h6>
                            @else
                              <h6 class="mb-0 text-sm">{{$listProSev->totalNenhum}} </h6>                                                    
                            @endif                            
                        </div>
                      </td>
                      
                      <td>
                        <a href="/problema-detalhado/{{$listProSev->id}}" title="Mais detalhes sobre o problema" class="btn btn-info " style="padding: 5px 10px;">
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

            <!-- Paginação -->

            <div>          
            
            <style>

              .page-item .page-link, .page-item span {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  color: #000;
                  padding: 0;
                  margin: 0 8px;
                  border-radius: 30% !important;
                  width: 36px;
                  height: 35px;
                  font-size: 1rem;
              }

              .page-link.active, .active>.page-link {
                  z-index: 3;
                  color: var(--bs-pagination-active-color);
                  background-color: #1a73e8;
                  border-color: #1a73e8;
              }
             
            </style>

            <div class="container">
              <!-- Exibir links de paginação -->
              {{ $listProSevLev->render("pagination::bootstrap-4") }}
            </div>

          </div>




          </div>
        </div>
      </div>    
  
</x-layout>