<x-layout title="Usuários">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Alterar Senha de Usuário </h6>
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

             

              <form role="form" class="text-start" action="/change-password/{{$dataUser->id}}" method="post">
                @csrf
                <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
                    Campo com * é de preenchimento obrigatório.                      
                  </p>
                <div class="input-group input-group-outline my-3"> 
                 <label for="patternVersion" class="lab-center"> Usuário: {{$dataUser->name}} </label>                   
                  <!--<input type="text" name="name" class="form-control" readonly placeholder="Nome do usuário" value="{{$dataUser->name}}" />-->
                </div>

                <div class="input-group input-group-outline my-3">   
                  <label for="patternVersion" class="lab-center">E-mail: {{$dataUser->email}} </label>                 
                  <!--<input type="text" name="email" class="form-control" readonly placeholder="E-mail" value="{{$dataUser->email}}" /> -->
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="password" name="password" class="form-control" placeholder=" * Nova Senha" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="password" name="confirm_password" class="form-control" placeholder=" * Confirmar nova senha" />
                </div>

                <div class="d-flex justify-content-end mb-3">
                  <button type="submit" class="btn bg-gradient-info"> Alterar Senha </button>
                </div>                  
              </form>
              
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