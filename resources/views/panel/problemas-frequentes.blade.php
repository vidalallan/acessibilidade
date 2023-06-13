<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<x-layout title="Problemas frequentes">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Ranking dos problemas mais frequentes </h6>
              </div>
            </div>            

            <div class="card-body pt-4 pb-3">
              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                Total de Problemas cadastrados: {{count($issues)}} 
              </h6>

              <h6 class="text-uppercase text-sm font-weight-bolder opacity-7" style="text-align:center;">
                <a href="/problemas-frequentes?order=desc" style="color:#e91e63"> 
                  + Mais frequentes&nbsp;
                </a>

                <a href="/problemas-frequentes?order=asc" style="color:#3173e1"> 
                  - Menos frequentes
                </a>
              </h6>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Posição</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do problema</th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Total </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Percentual </th>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7 ps-2"> Visualizar Problemas </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i=1; $cor="#f00"; $medal=""; @endphp

                    @foreach($problems as $p)                                       

                    @php
                    if($i==1){
                      $cor = "#f0c04d";
                      $medal = "social_leaderboard";
                    }
                    else if($i==2){
                      $cor = "#c3cbce";
                      $medal = "social_leaderboard";
                    }
                    else if($i==3){
                      $cor = "#eeb18b";
                      $medal = "social_leaderboard";
                    }
                    else{
                      $cor="";
                      $medal="";
                    }
                    @endphp
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm"> @if($i>3) {{$i}}º @endif </h6>
                            @for($cont=1;$cont<=$i;$cont++)
                              <span class="material-symbols-outlined" style="color:{{$cor}};">{{$medal}}</span>                                               
                            @endfor
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$p->problem}} </h6>                                                    
                        </div>
                      </td>                   

                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">{{$p->total}} </h6>                                                    
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex px-3 py-1">                         
                            <h6 class="mb-0 text-sm">
                              {{number_format($p->total/count($issues) * 100,2)}}%                           
                            </h6>                                                    
                        </div>
                      </td>

                      <td>                        
                        <a href="/problemas-filtrar?searchBy=1&searchField={{$p->problem}}" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;top:8px;">
                          Visualizar Problemas                            
                        </a>
                      </td>
                                     
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>


          </div>
        </div>
      </div>    
  
</x-layout>