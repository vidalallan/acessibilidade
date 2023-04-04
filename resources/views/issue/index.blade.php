<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <!-- Ícones -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>               

    <section class="container-fluid" style="max-width: 80%;margin: 0 auto;">   
        <h1> Possíveis Problemas de Acessibilidade </h1>        
    </section>

    <section>
        <div class="container-fluid" style="max-width: 80%;margin: 0 auto;">

            <form action="/questao" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Título do problema</label>
                    <input type="text" name="title" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Descrição do problema</label>
                    <input type="text" name="description" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Padrão</label>                    

                    <select class="form-control" name="idPattern">
                        @foreach($patterns as $pattern)                                    
                            <option value="{{$pattern->idPattern}}"> {{$pattern->pattern}} </option>                           
                                            
                        @endforeach                        
                    </select>  

                    <div id="" class="form-text">Padrão a ser escolhido.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Versão do Padrão</label>
                    <input type="text" name="patternVersion" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Versão do Padrão.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Detalhes da Versão do Padrão (categoria, regra etc)</label>
                    <input type="text" name="patternVersionDetailts" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Detalhes da Versão.</div>
                </div>


                
                <div class="mb-3">
                    <label for="" class="form-label">Nome do Aplicativo</label>
                    <input type="text" name="appTitle"  class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Id do Campo do Aplicativo</label>
                    <input type="text" name="appFieldId" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Nome do Campo do Aplicativo</label>
                    <input type="text" name="appFieldName" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Print da Tela do Aplicativo</label>
                    <input type="file" name="printScreen" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                
                <div class="mb-3">
                    <label for="" class="form-label">Dispositivo</label>
                    <select class="form-control" name="idDevice">
                        @foreach($devices as $device)                                    
                            <option value="{{$device->idDevice}}"> {{$device->device}} </option>                           
                                            
                        @endforeach                        
                    </select>                    
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Modelo do Dispositivo</label>
                    <input type="text" name="devideModel" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Versão do Dispositivo</label>
                    <input type="text" name="version" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Link do Aplicativo </label>
                    <input type="text" name="linkApp" class="form-control" id="" aria-describedby="">
                    <div id="" class="form-text">Descrição para preenchimento do campo.</div>
                </div>
                
                <button type="submit" class="btn btn-primary"> Salvar </button>
            </form>

        </div>
    </section>





    <!--
    <section class="container-fluid" style="max-width: 60%;margin: 0 auto;">   

        <form action="/dispositivo" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="device" class="form-control" placeholder="Digite o nome do dispositivo que deseja cadastrar" />    
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-success"> Salvar </button>
            </div>
        </form>

    </section>

    <section class="container-fluid" style="max-width: 60%;margin: 0 auto;">
        <p class="text-dark text-right">
            Total de Dispositivos cadastrados: {{App\Http\Controllers\DeviceController::countDeviceView()}} 
        </p>
    </section>
    -->

    <section class="container-fluid" style="max-width: 80%;margin: 0 auto;">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!--<th scope="col">ID</th>-->
                        <th scope="col">Título</th>            
                        
                        <th scope="col"> Descrição </th>
                        <th scope="col"> Id Campo </th>
                        <th scope="col"> Nome Campo </th>
                        <th scope="col"> Print </th>
                        <th scope="col"> Dispositivo </th>
                        <th scope="col"> Modelo </th>
                        <th scope="col"> Versão </th>
                        <th scope="col"> App </th>
                        <th scope="col"> Link do App </th>
                        <th scope="col"> Padrão </th>
                        <th scope="col"> Versão  </th>
                        <th scope="col"> Detalhes </th>
                        <th scope="col"> Origem </th>
                        <th scope="col">Editar</th> 
                        <th scope="col">Excluir</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                    <tr>                        
                        <td>{{$issue->title}}</td>   
                        <td>{{$issue->description}}</td>
                        <td>{{$issue->appFieldId}}</td>
                        <td>{{$issue->appFieldName}}</td>
                        <td>{{$issue->printScreen}}</td>
                        <td>{{$issue->idDevice}}</td>
                        <td>{{$issue->devideModel}}</td>
                        <td>{{$issue->version}}</td>
                        <td>{{$issue->appTitle}}</td>
                        <td>{{$issue->linkApp}}</td>
                        <td>{{$issue->idPattern}}</td>
                        <td>{{$issue->patternVersion}}</td>
                        <td>{{$issue->patternVersionDetailts}}</td>
                        <td>{{$issue->origin}}</td>


                        <td> 
                            <a href="#" class="text-primary">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>    
                        </td>                
                        <td> 
                            <a href="" class="text-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>    
                        </td>                                
                    </tr>           
                    @endforeach
                </tbody>
            </table>
        </div>    

    </section>   
    
</body>
</html>