<x-layout title="Questões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Problemas / Barreiras de Acessibilidade Avaliados </h6>
              </div>
            </div>                       

            <div class="card-body px-0 pb-2">

              <div class="card-body pt-4 pb-3">
                <form action="/query-filter" method="get">
                  <label> Pesquisar por: </label>
                  <select class="form-select form-select-lg" name="searchBy">
                    <option value="0"> Escolha uma das opções </option>                  
                    <option value="1"> Título do problema </option>
                    <option value="2"> Dispositivo </option>
                    <option value="3"> Aplicativo </option>
                    <option value="4"> Padrão de Acessibilidade </option>                    
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
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7">Data<br /> de Criação</th>
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
                        <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm">{{date( 'd/m/Y',strtotime($issue->creationDate))}} </h6></div> </td>
                        <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm"> {{$issue->problem}} </h6></div> </td>                         
                        <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->device}} </h6></div> </td>                      
                        <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->appTitle}} </h6></div> </td>                      
                        <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->pattern}} </h6> </div></td>                      
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