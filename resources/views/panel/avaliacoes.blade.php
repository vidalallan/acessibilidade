<x-layout title="Avaliações ">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Avaliações das Problemas de Acessibilidade realizadas pelo Usuário </h6>
              </div>
            </div>           

            <div class="card-body pt-4 pb-3">

                @if(session('mensagemExclusao'))
                  <div class="alert alert-danger">
                      <p style="color:#fff;">{{session('mensagemExclusao')}}</p>
                  </div>
                @endif

              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                <!-- Total de avaliações realizadas: {{App\Http\Controllers\AssessmentController::countAssessmentView()}}-->
                Total de avaliações {{count($assessments)}}
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do Problema</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">É um problema?</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Gravidade </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Justificativa</th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($assessments as $a)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$a->titProblem}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">
                        
                          @if($a->problem==0)
                            <h6 class="mb-0 text-sm"> Não </h6>      
                          @else
                            <h6 class="mb-0 text-sm"> Sim </h6>      
                          @endif               
                            
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm" style="background:{{$a->severityColor}};color:#fff;padding:5px 10px;width:100%;border-radius:5px;">{{$a->severity}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">
                            @if($a->justification==null)
                              <h6 class="mb-0 text-sm"> - </h6>                                                    
                            @else
                              <h6 class="mb-0 text-sm">{{$a->justification}} </h6>                                                    
                            @endif
                            
                        </div>
                      </td>
                      
                      <td>                     
                        <a href="{{url('/problema-detalhado')}}/{{$a->issueId}}" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>  
                        
                        <a href="/avaliacoes/{{$a->id}}/editar" class="btn btn-success btn-round" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>

                        <a href="/avaliacoes/{{$a->id}}" class="btn btn-danger btn-round" style="padding: 5px 10px;"
                           data-toggle="modal" data-target="#exampleModal"
                           onclick="setaDadosModal({{$a->id}},'{{$a->problem}}')">

                            <p class="text-xs font-weight-bold mb-0">
                              <i class="material-icons opacity-10">delete</i>                            
                            </p>                        
                        </a> 
                        
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
                          function setaDadosModal(idProblema,titulo) {
                              texto = document.getElementById('textoExclusao');                              
                              texto.innerHTML = "Deseja realmente excluir a avaliação para a questão "+ titulo + "?";

                              a = document.querySelector("#link-excluir");
                              a.href = "/avaliacoes/"+idProblema;
                          }
                        </script>                        

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