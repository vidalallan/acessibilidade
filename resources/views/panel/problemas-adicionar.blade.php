<x-layout title="Problemas de Acessibilidade">
 
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3"> Adicione o Problema / Barreira de acessibilidade </h6>
            </div>
          </div>

          <div class="card-body pt-4 pb-3">                                

            <form role="form" class="text-start" action="/problemas" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="title" placeholder="Título do problema">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="description" placeholder="Descrição do problema">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="pattern" placeholder="Padrão">              
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="patternVersion" placeholder="Versão do Padrão">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="patternVersionDetailts" placeholder="Detalhes da Versão do Padrão (categoria, regra etc)">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appTitle" placeholder="Nome do Aplicativo">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appFieldId" placeholder="Id do Campo do Aplicativo">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appFieldName" placeholder="Nome do Campo do Aplicativo">
            </div>           
            
            <div class="input-group input-group-outline my-3">                                    
              <input type="file" title="Print da Tela do Aplicativo" name="printScreen" class="form-control inputFileHidden" id="" />
            </div>              
            
            <div class="input-group input-group-outline my-3">                                    
              <select class="form-control" name="idDevice">
                <option value="0"> Escolha um dispositivo </option>
                @foreach($devices as $device)                                    
                    <option value="{{$device->idDevice}}"> {{$device->device}} </option>
                @endforeach                        
              </select>
            </div>
            
            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="devideModel" placeholder="Modelo do Dispositivo">
            </div>
            
            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="version" placeholder="Versão do Dispositivo">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="linkApp"  placeholder="Link do Aplicativo">
            </div>        
                                                
            <div class="d-flex justify-content-end mb-3">
              <button type="submit" class="btn bg-gradient-info"> Salvar </button>
            </div>                  
          </form>              
        </div>           
          
        </div>
      </div>
    </div>
  </div>            
  
</x-layout>