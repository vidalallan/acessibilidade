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

            <form role="form" class="text-start" action="/problemas" method="post" enctype="multipart/form-data">
            @csrf

            <p class="mb-2 text-sm mx-auto" style="color:#fb8c00;">
              Campos com * são de preenchimento obrigatório.                      
            </p>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="title" placeholder=" * Título do problema" value="{{old('title')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="description" placeholder="Descrição do problema" value="{{old('description')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="pattern" placeholder="Padrão" value="{{old('pattern')}}">              
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="patternVersion" placeholder="Versão do Padrão" value="{{old('patternVersion')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="patternVersionDetailts" placeholder="Detalhes da Versão do Padrão (categoria, regra etc)" value="{{old('patternVersionDetailts')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appTitle" placeholder=" * Nome do Aplicativo" value="{{old('appTitle')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appFieldId" placeholder="Id do Campo do Aplicativo" value="{{old('appFieldId')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="appFieldName" placeholder="Nome do Campo do Aplicativo" value="{{old('appFieldName')}}">
            </div>           
            
            <div class="input-group input-group-outline my-3">                                    
              <!-- <input type="file" title="Print da Tela do Aplicativo" name="printScreen" class="form-control inputFileHidden" id="" />-->
             
              <style>

                .inputfile-box {
                  position: relative;
                }

                .inputfile {
                  display: none;                  
                }

                .container {
                  display: inline-block;
                  width: 100%;
                }

                .file-button {
                  background: #f0f2f5;
                  padding: 5px 0px;
                  position: absolute;                  
                  top: 4px;
                  left: 10px;
                  cursor:pointer;
                }

                .file-box {                     
                  background: #fff;
                  padding: 5px 0px;
                  margin-left: 15px;                 
                }

              </style>

              <div class="form-control">              
                  <input type="file" id="file" class="inputfile" name="printScreen" onchange='uploadFile(this)' />
                  <label for="file">                  
                    <span class="file-button">
                      <i class="fa fa-upload" aria-hidden="true"></i>
                      &nbsp;&nbsp;
                      Escolha o arquivo referente ao problema
                      <span id="file-name" class="file-box"></span>
                    </span>
                  </label>

                  <span id="file-name" class="file-box"></span>              
              </div>


              <script>
                function uploadFile(target) {
                  document.getElementById("file-name").innerHTML = target.files[0].name;
                }
              </script>

            </div>              
            
            <div class="input-group input-group-outline my-3 form-control">                                                  
              <select class="form-select form-select-lg" name="idDevice">
                <option value="0"> Escolha um dispositivo </option>
                @foreach($devices as $device)                                    
                  <option value="{{$device->idDevice}}" @if(old('idDevice')==$device->idDevice) {{'selected'}} @endif > {{$device->device}} </option>                                        
                @endforeach                        
              </select>
            </div>
            
            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="devideModel" placeholder="Modelo do Dispositivo" value="{{old('devideModel')}}">
            </div>
            
            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="version" placeholder="Versão do Dispositivo" value="{{old('version')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <input type="text" class="form-control" name="linkApp"  placeholder="Link do Aplicativo" value="{{old('linkApp')}}">
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