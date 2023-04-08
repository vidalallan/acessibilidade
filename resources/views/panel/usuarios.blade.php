<x-layout title="Usuários">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Usuários </h6>
              </div>
            </div>           

            <div class="card-body pt-4 pb-3">

              @if(session('mensagemExclusao'))
                <div class="alert alert-danger">
                    <p style="color:#fff;">{{session('mensagemExclusao')}}</p>
                </div>
              @endif

              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Usuários cadastrados: {{App\Http\Controllers\UserController::countUserView()}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Nome </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> E-mail </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Data de criação </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$user->name}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$user->email}} </h6>                                                    
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{date( 'd/m/Y',strtotime($user->created_at))}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>                        
                        <a href="/usuarios/{{$user->id}}" class="btn btn-success btn-round" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>                        

                        <a href="/usuarios/{{$user->id}}" class="btn btn-danger btn-round" style="padding: 5px 10px;"
                           data-toggle="modal" data-target="#exampleModal"
                           onclick="setaDadosModal({{$user->id}},'{{$user->name}}')">

                            <p class="text-xs font-weight-bold mb-0">
                              <i class="material-icons opacity-10">close</i>                            
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
                          function setaDadosModal(idUsuario,usuario) {
                              texto = document.getElementById('textoExclusao');                              
                              texto.innerHTML = "Deseja realmente excluir o usuário "+ usuario + "?";

                              a = document.querySelector("#link-excluir");
                              a.href = "/usuarios/"+idUsuario;
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