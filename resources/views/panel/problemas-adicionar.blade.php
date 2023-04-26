<x-layout title="Problemas de Acessibilidade">

  <style>
    .lab-center{
      color: #000;
      color: #000000bf;
      margin-top: 13px;
      margin-right: 10px;
      font-weight: 700;
    }

    .leg-sn{
      font-size: 1rem;
      margin-top: 0px;  
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .input-group>.form-control, .input-group>.form-select, .input-group>.form-floating {
      position: relative;
      flex: 1 1 auto;
      width: inherit;
      min-width: 0;
    }

    ::-webkit-input-placeholder {
      color: #000!important;   
    }

    :-moz-placeholder {
      color: #000!important;      
    }

    ::-moz-placeholder {
      color: #000!important;      
    }

    :-ms-input-placeholder {  
      color: #000!important;     
    }

    .form-control {
      padding: initial;
    }

  </style> 
   
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

            <p class="mb-2 text-sm mx-auto" style="color:#b73807;font-weight:500;">
              Campos com * são de preenchimento obrigatório.                      
            </p>

            <script>
              function cadastrarNovoProblema() {
                  var problemId = document.getElementById("problemId").value;

                  if (problemId == -1) { 
                    document.getElementById("titleId").style.display = "flex";
                    document.getElementById("descrTitleId").style.display = "flex";                      
                    document.getElementById("title").value="";
                    document.getElementById("description").value="";
                      
                  } else {                    
                    document.getElementById("titleId").style.display = "none";
                    document.getElementById("descrTitleId").style.display = "none";
                  }
              }              
            </script>

            <div class="input-group input-group-outline my-3 form-control">
            
              <label for="problemId" class="lab-center"> * Escolha uma das opções para o título do problema  </label>
            
              <select class="form-select form-select-lg" name="problemId" id="problemId" onchange="cadastrarNovoProblema()"
                      style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                <option value="0"> * Escolha uma das opções para o título do problema </option>                
                <option id="novoProblema" value="-1"> Adicione um novo problema (caso ele não esteja na lista) </option>
                @foreach($problems as $problem)                                    
                  <option value="{{$problem->id}}" @if(old('problemId')==$problem->id) {{'selected'}} @endif > {{$problem->problem}} - Descrição: {{$problem->description}}</option>                                        
                @endforeach                        
              </select>
            </div>                                  

            <div class="input-group input-group-outline my-3" id="titleId" style="display: none;">
              <label for="title" class="lab-center"> * Título do novo problema </label>                    
              <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{old('title')}}">
            </div>

            <div class="input-group input-group-outline my-3" id="descrTitleId" style="display: none;">                    
              <label for="description" class="lab-center"> Descrição do problema </label>
              <input type="text" class="form-control" id="description" name="description" placeholder="" value="{{old('description')}}">
            </div>

            <!--
            <div class="input-group input-group-outline my-3">                    
               Padrão de acessibilidade
              <input type="text" class="form-control" name="pattern" placeholder="Guia de acessibilidade " value="{{old('pattern')}}">              
            </div>
            -->

            <div class="input-group input-group-outline my-3 form-control">
            <label for="patternId" class="lab-center"> * Guia de Acessibilidade  </label>                                                  
              <select class="form-select form-select-lg" id="patternId" name="patternId" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                <option value="0"> Escolha um Guia de acessibilidade </option>                                
                @foreach($patterns as $pattern)                                    
                  <option value="{{$pattern->id}}" @if(old('patternId')==$pattern->id) {{'selected'}} @endif > {{$pattern->pattern}} </option>                                        
                @endforeach                        
              </select>
            </div>

            <div class="input-group input-group-outline my-3">
            <label for="patternVersion" class="lab-center">Versão do Padrão  </label>                    
              <input type="text" class="form-control" id="patternVersion" name="patternVersion" placeholder="" value="{{old('patternVersion')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
            <label for="patternVersionDetailts" class="lab-center">Detalhes da Versão do Padrão  </label>
              <input type="text" class="form-control" id="patternVersionDetailts" name="patternVersionDetailts" placeholder="" value="{{old('patternVersionDetailts')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
            <label for="appTitle" class="lab-center"> * Nome do Aplicativo  </label>
              <input type="text" class="form-control" id="appTitle" name="appTitle" placeholder="" value="{{old('appTitle')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
            <label for="appFieldId" class="lab-center">Id do Campo do Aplicativo  </label>
              <input type="text" class="form-control" id="appFieldId" name="appFieldId" placeholder="" value="{{old('appFieldId')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
            <label for="appFieldName" class="lab-center">Nome do Campo do Aplicativo </label>
              <input type="text" class="form-control" id="appFieldName" name="appFieldName" placeholder="" value="{{old('appFieldName')}}">
            </div>  
            
            <div class="input-group input-group-outline my-3">                    
            <label for="linkApp" class="lab-center"> Link do Aplicativo </label>
              <input type="text" class="form-control" id="linkApp" name="linkApp"  placeholder="" value="{{old('linkApp')}}">
            </div>
            
            <div class="input-group input-group-outline my-3">                                    
              <!-- <input type="file" title="Print da Tela do Aplicativo" name="printScreen" class="form-control inputFileHidden" id="" />-->
              <label for="file" class="lab-center">Arquivo relacionado ao problema de acessibilidade  </label>
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
                  color:#000; 
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
            
            <div class="input-group input-group-outline my-3">                    
            <label for="tool_problem" class="lab-center">Ferramenta que identificou o problema  </label>
              <input type="text" class="form-control" id="tool_problem" name="tool_problem" placeholder="" value="{{old('tool_problem')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
            <label for="tool_problem_version" class="lab-center"> Versão da Ferramenta que identificou o problema </label>
              <input type="text" class="form-control" id="tool_problem_version" name="tool_problem_version" placeholder="" value="{{old('tool_problem_version')}}">
            </div>

            <div class="input-group input-group-outline my-3">                    
              <label for="flow_identify_problem" class="lab-center">Descreva o fluxo utilizado na identificação do problema </label>
              <input type="text" class="form-control" id="flow_identify_problem" name="flow_identify_problem" placeholder="" value="{{old('flow_identify_problem')}}">
            </div>

            <script>
              function verOpcaoFerrAss(){
                var op ="";

                if (document.getElementById("assistive_technology_tool1").checked) {                  
                  document.getElementById("fta").style.display = "none";
                  document.getElementById("vfta").style.display = "none"; 
                } else if (document.getElementById("assistive_technology_tool2").checked) {                  
                    document.getElementById("fta").style.display = "flex";
                    document.getElementById("vfta").style.display = "flex";                      
                    document.getElementById("tool_assistive").value="";
                    document.getElementById("tool_assistive_version").value="";
                }
              }
            </script>        

            <div class="input-group input-group-outline my-3" style="display:block;">                                  
              <fieldset class="input-group input-group-outline my-3">             
              <label for="le" class="lab-center"> Utilizou alguma ferramenta de tecnologia assistiva? </label>                 
                  <legend class="leg-sn" id="le" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                    <label for="assistive_technology_tool1"> 
                      <input type="radio" id="assistive_technology_tool1" onchange="verOpcaoFerrAss()" name="assistive_technology_tool" value="0" checked /> <span style="color:#000;"> NÃO </span> 
                    </label>
                    <label for="assistive_technology_tool2"> 
                      <input type="radio" id="assistive_technology_tool2" onchange="verOpcaoFerrAss()" name="assistive_technology_tool" value="1" style="margin-left:20px;" /> <span style="color:#000;"> SIM </span>
                     </label>
                  </legend>
              </fieldset>
            </div>

            <div class="input-group input-group-outline my-3" id="fta" style="display: none;">  
            <label for="tool_assistive" class="lab-center">Ferramenta de tecnologia assistiva  </label>                  
              <input type="text" class="form-control" id="tool_assistive" name="tool_assistive" placeholder="" value="{{old('tool_assistive')}}">
            </div>

            <div class="input-group input-group-outline my-3" id="vfta" style="display: none;">  
            <label for="tool_assistive_version" class="lab-center">Versão da ferramenta de tecnologia assistiva  </label>                  
              <input type="text" class="form-control" id="tool_assistive_version" name="tool_assistive_version" placeholder="" value="{{old('tool_assistive_version')}}">
            </div>
            
            
            <div class="input-group input-group-outline my-3 form-control">            
            <label for="idDevice" class="lab-center"> * Dispositivo </label>                                      
              <select class="form-select form-select-lg" id="idDevice" name="idDevice" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                <option value="0"> * Escolha um dispositivo </option>
                @foreach($devices as $device)                                    
                  <option value="{{$device->idDevice}}" @if(old('idDevice')==$device->idDevice) {{'selected'}} @endif > {{$device->device}} </option>                                        
                @endforeach                        
              </select>
            </div>
            
            <div class="input-group input-group-outline my-3">                    
            <label for="devideModel" class="lab-center">Modelo do Dispositivo  </label>
              <input type="text" class="form-control" id="devideModel" name="devideModel" placeholder="" value="{{old('devideModel')}}">
            </div>
            
            <div class="input-group input-group-outline my-3">                    
            <label for="version" class="lab-center"> Versão do Dispositivo  </label>
              <input type="text" class="form-control" id="version" name="version" placeholder="" value="{{old('version')}}">
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