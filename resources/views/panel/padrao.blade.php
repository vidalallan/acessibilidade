<x-layout title="Padrões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Guias de Acessibilidade </h6>
              </div>
            </div>

            <div class="card-body pt-4 pb-3">              
                  <form role="form" class="text-start" action="/padroes" method="post">
                  @csrf
                  <div class="input-group input-group-outline my-3">
                    
                    <input type="text" name="pattern" class="form-control" placeholder="Digite o nome do padrão que deseja cadastrar">
                  </div>
                                                      
                  <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn bg-gradient-info"> Salvar </button>
                  </div>                  
                </form>              
            </div>

            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Padrões cadastrados: {{App\Http\Controllers\PatternController::countPatternView()}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Dispositivo</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($patterns as $pattern)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$pattern->pattern}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>
                        <a href="/padroes/{{$pattern->idPattern}}" class="btn btn-success btn-round" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>                        

                        <a href="/padroes/{{$pattern->idPattern}}" class="btn btn-danger btn-round" style="padding: 5px 10px;">
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