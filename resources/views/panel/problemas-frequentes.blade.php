<x-layout title="Problemas frequentes">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Ranking dos problemas mais frequentes </h6>
              </div>
            </div>

            

            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Problemas cadastrados: {{count($issues)}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Posição</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do problema</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Total </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Percentual </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Visualizar Problemas </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($problems as $p)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm"> 1 </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$p->problem}} </h6>                                                    
                        </div>
                      </td>                   

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$p->total}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">
                              {{number_format($p->total/count($issues) * 100,2)}}%                           
                            </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">
                              <a href="#"> Visualizar Problemas </a>                           
                            </h6>                                                    
                        </div>
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