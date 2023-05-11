<x-layout title="Alteração da avaliação Realizada">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Alteração da avaliação Realizada </h6>
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



                <form role="form" class="text-start" action="/avaliacoes/update/{{$assessment->id}}" method="post">
                  @csrf
                  <h6> {{$assessment->titProblem}} colocar o título do problema</h6>
                  
                  <h6> Este é de fato um problema de acessibilidade no aplicativo? </h6>

                  <input type="hidden" name="issueId" value="{{$assessment->issueId}}"/>
                  
                  <fieldset class="input-group input-group-outline my-3">                              
                      <legend style="font-size: 1rem;">
                        <input type="radio" name="problem" value="0" {{$assessment->problem==0 ? 'checked' : '' }} /> <span style="color:#000;"> NÃO </span>
                        <input type="radio" name="problem" value="1" {{$assessment->problem==1 ? 'checked' : '' }} style="margin-left:20px;" /> <span style="color:#000;"> SIM </span>
                      </legend>
                  </fieldset>

                  <div class="input-group input-group-outline my-3">                              
                    <select class="form-select form-select-lg" id="" name="severityId" style="border: 1px solid #d2d6da;border-radius: 0.375rem;padding-left: 10px;">
                      <!--<option value="0"> * Escolha um Nível de criticidade </option>-->                                
                      @foreach($severityLevel as $sl)                                    
                        <option value="{{$sl->id}}" {{$sl->id == $assessment->severityId ? 'selected' : '' }}> {{$sl->severity}} </option>                                        
                      @endforeach                        
                    </select>                            
                  </div>

                  <div class="input-group input-group-outline my-3">
                    <textarea class="form-control" placeholder="Justificar opção escolhida" name="justification" style="height:100px">{{$assessment->justification}}</textarea>  
                  </div>                                                  

                  <div class="d-flex justify-content-end mb-3">                        
                      <button type="submit" class="btn bg-gradient-info"> Avaliar </button>                            
                  </div>
                </form>

             
            </div>
                     
          </div>
        </div>
      </div>    
  
</x-layout>