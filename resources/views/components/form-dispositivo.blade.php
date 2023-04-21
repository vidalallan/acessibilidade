<form role="form" class="text-start" action="{{$action}}" method="post">
    @csrf
    <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
        Campo com * é de preenchimento obrigatório.                      
    </p>

    @isset($devices->device)
        @method('PUT')
    @endisset
    <div class="input-group input-group-outline my-3">                    
        <input 
            type="text" 
            name="device" 
            class="form-control" 
            placeholder=" * Digite o nome do dispositivo que deseja cadastrar" 
            value="{{old('device')}}" />
    </div>
                                        
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn bg-gradient-info"> Salvar </button>
    </div>                  
</form> 