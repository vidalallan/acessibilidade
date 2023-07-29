<x-layout title="Questões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Problemas / Barreiras de Acessibilidade </h6>
              </div>
            </div>            

            <div class="card-body pt-4 pb-3">           

                <div class="card-body pt-4 pb-3">

                  <div class="d-flex justify-content-end mb-3">
                    <a href="/problemas-adicionar" class="btn btn btn-info " title="Adicionar problema" style="padding: 8px 17px;margin-top:-2px;">
                      <p class="text-xs font-weight mb-0">
                        <i class="material-icons opacity-10">add</i>  
                        Adicionar problema
                      </p>  
                    </a>

                    <a href="{{route('download.csv')}}" download style="    background: #53b553;
                        color: #fff;
                        padding: 3px 12px;
                        border-radius: 8px;
                        margin: 7px 10px;
                        top: -8px;
                        position: relative;"> Download CSV 
                    </a>
                  </div>

                  <form action="/problemas-filtrar" method="get">
                    <label> Pesquisar por: </label>
                    <select class="form-select form-select-lg" name="searchBy">
                      <option value="0"> Escolha uma das opções </option>                  
                      <option value="1"> Título do problema </option>
                      <option value="2"> Dispositivo </option>
                      <option value="3"> Aplicação </option>
                      <option value="4"> Guia de Acessibilidade </option>
                      <option value="5"> Problemas sem nenhuma avaliação </option>
                      <option value="6"> Problemas com pelo menos uma avaliação </option>
                    </select>

                    <div class="input-group input-group-outline my-3">                    
                      <input type="text" class="form-control" name="searchField"  placeholder="Digite aqui a sua consulta">
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                      <button type="submit" class="btn bg-gradient-info"> 
                        <span class="material-icons">search</span>
                        Pesquisar 
                      </button>
                    </div>
                  </form> 
                </div>


            <div class="row">

                  @if(session('mensagemExclusao'))
                    <div class="alert alert-danger">
                        <p style="color:#fff;">{{session('mensagemExclusao')}}</p>
                    </div>
                  @endif

                <div class="col-sm">                  
                  
                  <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                    <!-- Total de problemas cadastrados: {{App\Http\Controllers\IssueController::countIssueView()}}-->
                    Total de problemas: {{count($issues)}} 
                  </h6>               
                </div>

                <div class="col-sm">
                  <!--
                  <a href="/problemas-adicionar" class="btn btn btn-info " title="Adicionar problema" style="padding: 8px 17px;margin-top:-2px;">
                    <p class="text-xs font-weight mb-0">
                      <i class="material-icons opacity-10">add</i>  
                      Adicionar problema
                    </p>  
                  </a>
                  -->

                  <!--
                  <a href="{{route('download.csv')}}" download style="background: #53b553;
                      color: #fff;
                      padding: 9px 12px;
                      border-radius: 7px;"> Download CSV 
                  </a>
                  -->                 

                </div>
            </div>

            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Data </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Aplicação </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Total de Avaliações </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Dispositivo </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do Problema</th>                                           
                                            
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Guia de Acessibilidade </th>                  
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Já avaliou? </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Ações </th>      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($issues as $issue)                   
                    <tr>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm">  {{date( 'd/m/Y',strtotime($issue->creationDate))}} </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->appTitle}} </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->totalAvaliacoes}} </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->device}} </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm"> {{$issue->problem}} </h6></div> </td>                         
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> {{$issue->pattern}} </h6> </div></td>
                      
                      <td>
                        @foreach($idIssuetotUserAss as $a)
                          @if($issue -> id == $a->id)
                            <i class="material-icons opacity-10" style="font-weight: 900;
                                                                        color: #169516;
                                                                        font-size: 1.4em;
                                                                        margin-left: 15px;">done
                            </i>
                            @break
                          @endif                         
                        @endforeach
                      </td>

                      <td>

                        <a href="{{url('/problema-detalhado')}}/{{$issue->id}}" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>                                                 

                        <a href="{{url('/problema-detalhado')}}/{{$issue->id}}#evaluation" class="btn btn btn-warning btn-round" title="Avaliar o problema" style="padding: 3px 10px;">
                          <i class="material-icons opacity-10">note_add</i>                                                   
                        </a>

                        @AdminOnly
                        <a href="/problemas/{{$issue->id}}/editar" class="btn btn-success btn-round" title="Editar o problema" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>                        
                        @endAdminOnly


                        @AdminOnly
                        <a href="/problemas/{{$issue->id}}" class="btn btn-danger btn-round" title="Excluir o problema" style="padding: 5px 10px;"
                        data-toggle="modal" data-target="#exampleModal"
                        onclick="setaDadosModal({{$issue->id}},'{{$issue->problem}}')">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">delete</i>                            
                          </p>                        
                        </a>
                        @endAdminOnly

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p id="textoExclusao"></p>
                              </div>
                              <div class="modal-footer">                                                                                      
                                <a href="" id="link-excluir" class="btn btn-danger"> Sim </a>
                                <a href="#" class="btn bg-gradient-info" data-dismiss="modal"> Não </a>                                
                              </div>
                            </div>
                          </div>
                        </div>

                        <script>
                          function setaDadosModal(idProblema,problema) {
                              texto = document.getElementById('textoExclusao');                              
                              texto.innerHTML = "Deseja realmente excluir o problema "+ problema + "?";

                              a = document.querySelector("#link-excluir");
                              a.href = "/problemas/"+idProblema;
                          }
                        </script>

                      </td>                       
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>

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
                {{ $issues->render("pagination::bootstrap-4") }}
              </div>
              
            </div>

          </div>
        </div>
      </div>
        
</x-layout>