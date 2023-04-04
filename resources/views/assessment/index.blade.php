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

    <section class="container-fluid" style="max-width: 60%;margin: 0 auto;">   
        <h1> Avaliações </h1>
    </section>

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

    <section class="container-fluid" style="max-width: 60%;margin: 0 auto;">

        <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th scope="col">ID</th>-->
                    <th scope="col"> Questão </th>            
                    <th scope="col"> Problema </th>            
                    <th scope="col"> Justificativa </th>            
                    <th scope="col"> Editar </th> 
                    <th scope="col"> Excluir </th> 

                </tr>
            </thead>
            <tbody>
                @foreach($assessments as $assessment)
                <tr>
                    <!-- <th scope="row">{{$assessment->idAssessment}}</th> -->
                    <td>{{$assessment->idIssue}}</td>   
                    <td>{{$assessment->problem}}</td>   
                    <td>{{$assessment->justification}}</td>   
                    <td> 
                        <a href="#" class="text-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>    
                    </td>                
                    <td> 
                        <a href="/dispositivo/{{$assessment->idAssessment}}" class="text-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>    
                    </td>                                
                </tr>           
                @endforeach
            </tbody>
        </table>

    </section>   
    
</body>
</html>