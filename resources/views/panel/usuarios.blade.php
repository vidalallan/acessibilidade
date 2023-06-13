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

              <form role="form" class="text-start" action="/usuario/adicionar" method="post">
                @csrf
                <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
                    Campo com * é de preenchimento obrigatório.                      
                  </p>
                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="name" class="form-control" placeholder="Nome do usuário" value="{{old('name')}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="email" class="form-control" placeholder="E-mail" value="{{old('email')}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="password" name="password" class="form-control" placeholder="Senha" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar senha" />
                </div>

                <div class="input-group input-group-outline my-3 form-control">
                  <select class="form-select form-select-lg" name="levelUser" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                    <option value="admin"> Administrador  </option>
                    <option value="user"> Usuário </option>
                  </select>
                </div>
                                                    
                <div class="d-flex justify-content-end mb-3">
                  <button type="submit" class="btn bg-gradient-info"> Salvar </button>
                </div>                  
              </form>

              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Usuários cadastrados: {{App\Http\Controllers\UserController::countUserView()}} 
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Data de criação </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Nome </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> E-mail </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Nível </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Ações </th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)                    
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{date( 'd/m/Y',strtotime($user->created_at))}} </h6>                                                    
                        </div>
                      </td>
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
                            <h6 class="mb-0 text-sm">{{$user->level}} </h6>                                                    
                        </div>
                      </td>                    
                      
                      <td>                        
                        <a href="/usuarios/{{$user->id}}/editar" class="btn btn-success btn-round" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>    

                        <a href="/usuarios/{{$user->id}}" class="btn btn-danger btn-round" style="padding: 5px 10px;"
                           data-toggle="modal" data-target="#exampleModal"
                           onclick="setaDadosModal({{$user->id}},'{{$user->name}}')">

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

<script>

    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Senhas diferentes!");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>