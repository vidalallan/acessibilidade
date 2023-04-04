<x-layout title="Avaliações ">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Avaliações das Questões de Acessibilidade </h6>
              </div>
            </div>           

            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de avaliações realizadas: {{App\Http\Controllers\AssessmentController::countAssessmentView()}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Questão</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">É um problema?</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Justificativa</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($assessments as $a)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$a->title}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">
                        
                          @if($a->problem == 0)
                            <h6 class="mb-0 text-sm"> Não </h6>      
                          @else
                            <h6 class="mb-0 text-sm"> Sim </h6>      
                          @endif               
                            
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$a->justification}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>                     
                        <a href="{{url('/problema-detalhado')}}/{{$a->idIssue}}" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>                       

                        <a href="/avaliacoes/{{$a->idAssessment}}" class="btn btn-danger btn-round" style="padding: 5px 10px;">
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