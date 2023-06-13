<x-layout title="Nível de Gravidade">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Níveis de Gravidade </h6>
              </div>
            </div>

            <div class="card-body pt-4 pb-3">              

                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li style="color:#fff;">{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif 

                @if(session('mensagem'))
                  <div class="alert alert-success">
                      <p style="color:#fff;">{{session('mensagem')}}</p>
                  </div>
                @endif
                
                @if(session('mensagemExclusao'))
                  <div class="alert alert-danger">
                      <p style="color:#fff;">{{session('mensagemExclusao')}}</p>
                  </div>
                @endif

                <form role="form" class="text-start" action="/nivel-gravidade" method="post">
                @csrf
                <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
                  Campo com * é de preenchimento obrigatório.                      
                </p>
                
                <!--
                <div class="input-group input-group-outline my-3">                              
                  <select class="form-select form-select-lg" id="" name="severityId" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                    <option value="0"> * Escolha um Nível de criticidade </option>                                
                    @foreach($sl as $severity)                                    
                      <option value="{{$severity->id}}" @if(old('id')==$severity->id) {{'selected'}} @endif > {{$severity->severity}} </option>                                        
                    @endforeach                        
                  </select>                            
                </div>
                -->
                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="severity" class="form-control" placeholder=" * Nível de gravidade" value="{{old('severity')}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="description" class="form-control" placeholder=" Descrição" value="{{old('description')}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <label> Cor: <input type="color" name="severityColor" class="" placeholder=" Cor" value="{{old('severityColor')}}" /> </label>
                </div>
                                                    
                <div class="d-flex justify-content-end mb-3">
                  <button type="submit" class="btn bg-gradient-info"> Salvar </button>
                </div>                  
              </form>              
            </div>

            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de níveis de gravidade cadastrados: {{count($sl)}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Nível de gravidade</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Descrição</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Cor</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sl as $severity)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$severity->severity}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$severity->description}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm" style="background:{{$severity->severityColor}};color:#fff;padding: 4px 10px;border-radius: 5px;">{{$severity->severity}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>                        
                        <a href="/nivel-gravidade/{{$severity->id}}/editar" class="btn btn-success btn-round" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>                        

                        <a href="/nivel-gravidade/{{$severity->id}}" class="btn btn-danger btn-round" 
                           style="padding: 5px 10px;" data-toggle="modal" data-target="#exampleModal"
                           onclick="setaDadosModal({{$severity->id}},'{{$severity->severity}}')">

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
                          function setaDadosModal(idDispositivo,dispositivo) {
                              texto = document.getElementById('textoExclusao');                              
                              texto.innerHTML = "Deseja realmente excluir o nível de gravidade "+ dispositivo + "?";

                              a = document.querySelector("#link-excluir");
                              a.href = "/nivel-gravidade/"+idDispositivo;
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