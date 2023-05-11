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

                <form role="form" class="text-start" action="/nivel-gravidade/update/{{$sl->id}}" method="post">
                @csrf
                <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
                  Campo com * é de preenchimento obrigatório.                      
                </p>                
              
                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="severity" class="form-control" placeholder=" * Nível de gravidade" value="{{$sl->severity}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <input type="text" name="description" class="form-control" placeholder=" Descrição" value="{{$sl->description}}" />
                </div>

                <div class="input-group input-group-outline my-3">                    
                  <label> Cor: <input type="color" name="severityColor" class="" placeholder=" Cor" value="{{$sl->severityColor}}" /> </label>
                </div>
                                                    
                <div class="d-flex justify-content-end mb-3">
                  <button type="submit" class="btn bg-gradient-info"> Salvar </button>
                </div>                  
              </form>              
            </div>

          </div>
        </div>
      </div>    
  
</x-layout>