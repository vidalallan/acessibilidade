<x-layout title="Questões de Acessibilidade">



    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3"> Problemas / Barreiras de Acessibilidade Avaliadas </h6>
              </div>
            </div>            

            <div class="card-body pt-4 pb-3">  
              

            @foreach($issues as $issue)
            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5; border-radius: 7px;">
                  <strong class="title" style="font-size:1.1rem;color:#000;margin-top: 15px;"> 
                    Título do Problema: 
                    <span style="font-weight: 300;}"> {{$issue->title}} </span> 
                  </strong>
                  <br />
                  <strong class="title" style="color:#344767;">Descrição:  <span style="font-weight: 300;}">{{$issue->description}} </span> </strong>                  
                </div>
              </div>
            </div>

            <br />

            <div class="container" style="border-radius: 7px;">
              <div class="row" >
                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Aplicativo </strong>                
                  <p style="color:#000;"> {{$issue->appTitle}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Id do Campo do Aplicativo  </strong>                
                  <p style="color:#000;"> {{$issue->appFieldId}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Nome Campo </strong>                
                  <p style="color:#000;"> {{$issue->appFieldName}}  </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                  
                  <strong class="title" style="color:#344767;"> Link do Aplicativo </strong>                
                  <p> <a href="{{$issue->linkApp}}" target="_blank" style="color:#1b21e9;font-weight:300;"> Aplicativo {{$issue->appTitle}} </a> </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                <strong class="title" style="color:#344767;">  Print da tela com problema </strong>                
                  <p> 
                    <a href="{{asset('storage/'.$issue->printScreen)}}" download style="color:#1b21e9;font-weight:300;"> Download </a>
                    &nbsp;&nbsp;
                    <a href="{{asset('storage/'.$issue->printScreen)}}" target="_blank" style="color:#1b21e9;font-weight:300;"> Visualizar </a> 
                  </p>
                </div>

              </div>
            </div>                        

            <br />

            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Dispositivo  </strong>                
                  <p style="color:#000;"> {{$issue->device}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                  
                  <strong class="title" style="color:#344767;"> Modelo  </strong>                
                  <p style="color:#000;"> {{$issue->devideModel}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Versão do Dispositivo  </strong>                
                  <p style="color:#000;"> {{$issue->version}} </p>
                </div>                                
              </div>
            </div>

            <br />

            <div class="container">
              <div class="row">
                  <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Guia de Acessibilidade </strong>                
                  <p style="color:#000;"> {{$issue->pattern}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  
                <strong class="title" style="color:#344767;"> Versão do Padrão </strong>                
                  <p style="color:#000;"> {{$issue->patternVersion}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                 
                  <strong class="title" style="color:#344767;"> Detalhes do Padrão </strong>                
                  <p style="color:#000;"> {{$issue->patternVersionDetailts}} </p>
                </div>                                

                <div class="col-sm" style="background:#f0f2f5;">                 
                  <strong class="title" style="color:#344767;"> Origem </strong>                
                  <p style="color:#000;"> {{$issue->origin}} </p>       
                </div>                                

              </div>
            </div>

            <br />

            <div class="container">
              <div class="row">
                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Utilizou ferramenta de tecnologia assistiva?  </strong>                
                  <p style="color:#000;"> {{$issue->assistive_technology_tool}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">                  
                  <strong class="title" style="color:#344767;"> Qual ferramenta de tecnologia assistiva?  </strong>                
                  <p style="color:#000;"> {{$issue->tool_assistive}} </p>
                </div>

                <div class="col-sm" style="background:#f0f2f5;">
                  <strong class="title" style="color:#344767;"> Versão da ferramenta de tecnologia assistiva  </strong>                
                  <p style="color:#000;"> {{$issue->tool_assistive_version}} </p>
                </div>                                
              </div>
            </div>

            <br />
          
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
                            <textarea class="form-control" placeholder="Justificar opção escolhida" name="justification" style="height:100px"></textarea>  
                          </div>

                          <div class="input-group input-group-outline my-3">                    
                            <input type="text" class="form-control" name="severity" placeholder="Nível de criticidade">
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
                              <p class="mb-0 text-sm" style="color:#F44335;"> <i class="material-icons opacity-10"> mood_bad </i> SIM</p>      
                            @endif                                                    
                          </div>
                        </td>

                        <td>
                          @if($a->justification == null)
                            -
                            @else
                              <p style="color:#000;"> {{$a->justification}} </p>  
                            @endif                                                    
                        </td>
                        <td>
                          @if($a->severity == null)
                            <p style="color:#000;"> - </p>
                          @else
                            <p style="color:#000;">{{$a->severity}} </p> 
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