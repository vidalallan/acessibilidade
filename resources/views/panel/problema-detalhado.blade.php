<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<x-layout title="Questões de Acessibilidade">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> 
                  Detalhes do Problema / Barreira de Acessibilidade para a avaliação criado em 
                  @foreach($issues as $issue) {{date( 'd/m/Y',strtotime($issue->creationDate))}} @endforeach
                </h6>
              </div>
            </div>            

            <style>
              .row-border{
                /* background: #eff3f9; */
                border: 1px solid #cbd0d7;
                margin-bottom: 5px;
                border-radius: 3px;
                padding: 1px 4px;
              }

              .row-border strong{
                font-weight:500;
                color:#344767;
                padding: 0px 2px;
              }

              .row-border p{
                font-size:15px;
                color: #000;
                margin: 0px;
                padding: 0px 2px;
              }

            </style>  

            <div class="card-body pt-4 pb-3">                

            @foreach($issues as $issue)
              
            <div class="container" style="border-radius: 7px;">

              <div class="row" >

                <!-- Col 1 -->
                <div class="col-sm">

                  <div class="row-border">
                    <div>
                      <strong class="title"> Nome do Aplicativo que está sendo testado </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->appTitle}} </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Identificação do campo do aplicativo que está sendo testado </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->appFieldName==null)
                        <p style="color:#000;margin:0px"> - </p>
                      @else
                        <p style="color:#000;margin:0px"> {{$issue->appFieldName}} </p>
                      @endif
                    </div>
                  </div>                  

                  <div class="row-border">
                    <div>
                      <strong class="title"> Arquivo relacionado ao problema de acessibilidade encontrado no aplicativo </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->printScreen==null)
                        <p style="color:#000;">
                          Não fornecido
                        </p>  
                        @else
                        <!--<img src="{{asset('storage/'.$issue->printScreen)}}" />-->
                        <p>                           
                          <a href="{{asset('storage/'.$issue->printScreen)}}" target="_blank" style="color:#1b21e9;font-weight:300;"> 
                            <span class="material-symbols-outlined">file_open</span>
                            <span style="top: -7px;position: relative;">Visualizar arquivo</span> 
                          </a> 
                        </p>
                      @endif
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Fluxo utilizado na identificação do problema de acessibilidade </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->flow_identify_problem==null)
                        <p> - </p>
                      @else
                        <p style="color:#000;margin:0px"> {{$issue->flow_identify_problem}} </p>
                      @endif                      
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Link do Aplicativo que está sendo testado </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->linkApp==null)
                        <p style="color:#000;">
                          Não fornecido
                        </p>  
                      @else                      
                        <p> 
                          <a href="{{$issue->linkApp}}" target="_blank" style="color:#1b21e9;font-weight:300;"> 
                            <span class="material-symbols-outlined">link</span>
                            <span style="top: -7px;position: relative;"> Link para acessar a página do aplicativo {{$issue->appTitle}} </span>
                          </a>
                        </p>
                      @endif  
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Título do Problema: </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->problem}} </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Descrição do novo problema de acessibilidade </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->description}} </p>
                    </div>
                  </div>


                  <div class="row-border">
                    <div>
                      <strong class="title"> Dispositivo Móvel </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> 
                        <span class="material-symbols-outlined">smartphone</span>
                        <span style="top: -7px;position: relative;"> {{$issue->device}} </span>
                      </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Modelo do Dispositivo Móvel </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->devideModel==null)
                        <p> - </p>
                      @else
                      <p style="color:#000;margin:0px"> {{$issue->devideModel}} </p>
                      @endif
                      
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Versão do Dispositivo Móvel </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->version==null)
                        <p> - </p>
                      @else
                        <p style="color:#000;margin:0px"> {{$issue->version}}  </p>
                      @endif
                      
                    </div>
                  </div>

                  

                 
                  
                </div>

                <!-- Col 2 -->

                <div class="col-sm">

                                    
                  <div class="row-border">
                    <div>
                      <strong class="title"> Guia de acessibilidade utilizado como referência </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->pattern=='Nenhum')
                        <p style="color:#bf0000;margin:0px"> {{$issue->pattern}} </p>
                      @else
                        <p style="color:#000;margin:0px"> {{$issue->pattern}} </p>
                      @endif                      
                    </div>
                  </div>

                  @if($issue->pattern!='Nenhum')
                  <div class="row-border">
                    <div>
                      <strong class="title"> Versão do Guia de Acessibilidade </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->patternVersion}} </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Detalhes (princípio, diretriz etc), do guia de acessibilidade </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->patternVersionDetailts}} </p>
                    </div>
                  </div>
                  @endif

                  <div class="row-border">
                    <div>
                      <strong class="title"> Utilizou alguma ferramenta na identifcação do problema de acessibilidade? </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->toolUsed==0) 
                        <p style="color:#bf0000;"> 
                          Não
                        </p>
                      @else
                        <p style="color:#000;"> 
                          Sim
                        </p>
                      @endif
                    </div>
                  </div>
                  
                  @if(!$issue->toolUsed==0)
                  <div class="row-border">
                    <div>
                      <strong class="title"> Ferramenta utilizada na identificação do problema de acessibilidade</strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->tool_problem}} </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Versão da Ferramenta de acessibilidade que identificou o problema </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->tool_problem_version}} </p>
                    </div>
                  </div>
                  @endif
                  
                  <div class="row-border">
                    <div>
                      <strong class="title"> Utilizou alguma ferramenta de tecnologia assistiva? </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      @if($issue->assistive_technology_tool==0) 
                        <p style="color:#bf0000;"> 
                          Não
                        </p>
                      @else
                        <p style="color:#000;"> 
                          Sim
                        </p>
                      @endif
                    </div>
                  </div>

                  @if(! $issue->assistive_technology_tool==0)
                  <div class="row-border">
                    <div>
                      <strong class="title"> Qual o nome da ferramenta de tecnologia assistiva utilizada? </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->tool_assistive}} </p>
                    </div>
                  </div>

                  <div class="row-border">
                    <div>
                      <strong class="title"> Qual a versão da ferramenta de tecnologia assistiva utilizada? </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->tool_assistive_version}} </p>
                    </div>
                  </div>
                  @endif

                  <div class="row-border">
                    <div>
                      <strong class="title"> O problema foi cadastrado por meio da Aplicação Web ou utilizando a API? </strong>
                    </div>  
                                    
                    <div style="background:#fff;">
                      <p style="color:#000;margin:0px"> {{$issue->origin}} </p>
                    </div>
                  </div>  
                
              </div>
            </div>                        
          
            @endforeach
                  
            </div>

          </div>
          
        </div>

      </div>      

      <div class="container-fluid"> 
      <div  id="evaluation"></div>

        <div class="row">
        <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);">
          <!-- <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);max-width: 68%;"> -->
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background-image: linear-gradient(195deg, #adb5bd 0%, #495057 100%);">
                  <h6 class="text-white ps-3"> Avalie o problema descrito acima </h6>
                </div>
              </div>
                    
                <div class="container">
                  <div class="row">
                    
                  <div class="card-body pt-4 pb-3">                                
                      @if(App\Http\Controllers\IssueController::totalVotesUser(Request::segment(2))>0)                      
                        <h6> Já realizou a avaliação! </h6>
                      @else
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

                        <form role="form" class="text-start" action="/avaliar-problema" method="post">
                          @csrf                          
                          <h6> Este é de fato um problema de acessibilidade no aplicativo? </h6>

                          <input type="hidden" name="idIssue" value="{{Request::segment(2)}}"/>

                          

                          <fieldset class="input-group input-group-outline my-3">                              
                              <legend style="font-size: 1rem;">
                                <input type="radio" name="problem" value="0" checked /> <span style="color:#000;"> NÃO </span>
                                <input type="radio" name="problem" value="1" style="margin-left:20px;" /> <span style="color:#000;"> SIM </span>
                              </legend>
                          </fieldset>

                          <div class="input-group input-group-outline my-3">                              
                            <select class="form-select form-select-lg" id="" name="severityId" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                              <option value="0"> * Escolha um Nível de gravidade </option>                                
                              @foreach($severityLevel as $sl)                                    
                                <option value="{{$sl->id}}" @if(old('severityLevelId')==$sl->id) {{'selected'}} @endif > {{$sl->severity}} </option>                                        
                              @endforeach                        
                            </select>                            
                          </div>

                          <div class="input-group input-group-outline my-3">
                            <textarea class="form-control" placeholder="Justificar opção escolhida" name="justification" style="height:100px"></textarea>  
                          </div>
                                             
                          <div class="d-flex justify-content-end mb-3">                        
                              <button type="submit" class="btn bg-gradient-info"> Avaliar </button>                            
                          </div>
                        </form>
                      @endif        
                </div>

              </div>
            </div>
          </div>
      </div>



      <div class="container-fluid ">
        <div class="row">
          <!-- <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);max-width: 68%;"> -->
          <div class="col-12 start-0 end-0 mx-4" style="left: 48%!important;position: relative;transform: translate(-49%, 0%);">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background-image: linear-gradient(195deg, #adb5bd 0%, #495057 100%);">
                  <h6 class="text-white ps-3"> Justificativas das avaliações realizadas </h6>
                </div>
              </div>
                    
                <div class="container">
                  <div class="row">
                    
                  <div class="table-responsive card-body pt-4 pb-3">

                    <div class="table-responsive card-body pt-4 pb-3">
                      <p class="">
                        <span style="color:#000;"> Total de avaliações Realizadas: <span style="font-weight:500;"> @foreach($total as $t){{$t->yes + $t->no}} @endforeach </span> </span>                        
                        <span style="color:#cf0404;margin:0px 10px;"> 
                          Total de avaliações com Sim: 
                          <span style="color:#cf0404;font-weight:500;"> 
                            @foreach($total as $t)
                              {{$t->yes}} - 
                              <!-- {{$t->yes / ($t->yes + $t->no) *100}}% -->
                            @endforeach 
                          </span>
                        </span>                                                
                        
                        <span style="color:#018906;"> 
                          Total de avaliações com NÃO: 
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)
                              {{$t->no}}
                              <!-- {{$t->no / ($t->yes + $t->no) *100}}%-->
                            @endforeach
                          </span>
                        </span> 
                      </p>

                      <p class="">                                                
                        <span style="color:#cf0404;">                           
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)                              
                              Sim: {{number_format($t->yes/$t->total * 100,0)}}% 
                            @endforeach 
                          </span>
                        </span>                                                
                        <br />
                        <span style="color:#018906;">                           
                          <span style="font-weight:500;"> 
                            @foreach($total as $t)                              
                              Não: {{number_format($t->no/$t->total * 100,0)}}% 
                              
                            @endforeach
                          </span>
                        </span> 
                      </p>
                    </div>


                    <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7">É um problema de acessibilidade?</th>
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Justificativa </th>                      
                        <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Criticidade </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($assessments as $a)                    
                      <tr>
                        <td>
                          <div class="d-flex px-3 py-1">                         
                            @if($a->problem == 0)
                              <p class="mb-0 text-sm" style="color:#018906;"> <i class="material-icons opacity-10"> sentiment_very_satisfied </i> NÃO</p>      
                            @else
                              <p class="mb-0 text-sm" style="color:#cf0404;"> <i class="material-icons opacity-10"> mood_bad </i> SIM</p>      
                            @endif                                                    
                          </div>
                        </td>

                        <td>
                          @if($a->justification == null)
                              <p style="color:#000;"> - </p>
                            @else
                              <p style="color:#000;"> {{$a->justification}} </p>  
                            @endif                                                    
                        </td>
                        <td>
                          @if($a->severity == null)
                            <p style="color:#000;"> - </p>
                          @else
                            <p style=";background:{{$a->severityColor}};color:#fff;padding: 4px 10px;border-radius: 5px;">{{$a->severity}} </p> 
                          @endif                                                    
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



              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  
</x-layout>