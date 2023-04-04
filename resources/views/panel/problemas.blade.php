<x-layout title="Questões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Problemas / Barreiras de Acessibilidade </h6>
              </div>
            </div>            

            <div class="card-body pt-4 pb-3">

            <div class="row">
                <div class="col-sm">
                  <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                    Total de problemas cadastrados: {{App\Http\Controllers\IssueController::countIssueView()}} 
                  </h6>               
                </div>

                <div class="col-sm">
                  <a href="/problemas-adicionar" class="btn btn btn-info " title="Adicionar problema" style="padding: 8px 17px;margin-top:-2px;">
                    <p class="text-xs font-weight mb-0">
                      <i class="material-icons opacity-10">add</i>  
                      Adicionar problema
                    </p>  
                  </a>             
                </div>
            </div>

            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do Problema</th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Dispositivo </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Aplicativo </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Padrão de Acessibilidade </th>                  
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Ações </th>                                              
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($issues as $issue)                   
                    <tr>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm"> {{$issue->title}} </h6></div> </td>                         
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->device}} </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->appTitle}} </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->pattern}} </h6> </div></td>
                      
                      <td>

                        <a href="{{url('/problema-detalhado')}}/{{$issue->id}}" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>                                                 

                        <a href="{{url('/problema-detalhado')}}/{{$issue->id}}#evaluation" class="btn btn btn-warning btn-round" title="Avaliar o problema" style="padding: 3px 10px;">
                          <i class="material-icons opacity-10">note_add</i>  
                          <!--
                          <p class="text-xs font-weight mb-0">
                            Avaliar
                          </p>
                          -->                        
                        </a>

                        <a href="/problemas/{{$issue->id}}" class="btn btn-success btn-round" title="Editar o problema" style="padding: 5px 10px;">
                            <p class="text-xs font-weight-bold mb-0">
                              <i class="material-icons opacity-10">edit</i>                            
                            </p>                        
                          </a>                        

                          <a href="/problemas/{{$issue->id}}" class="btn btn-danger btn-round" title="Excluir o problema" style="padding: 5px 10px;">
                            <p class="text-xs font-weight-bold mb-0">
                              <i class="material-icons opacity-10">close</i>                            
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