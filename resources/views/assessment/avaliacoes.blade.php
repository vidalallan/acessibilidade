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
        <h1> Consulta das avaliações realizadas </h1>
    </section>

    <section class="container-fluid" style="max-width: 60%;margin: 40px auto;">   
        <form action="/questao" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Pesquisar por:</label>
                <select class="form-control" name="idPattern">
                    <option value="1"> Escolha uma </option>                                                       
                    <option value="1"> Todas questões </option>
                    <option value="1"> Questão específica </option>
                    <option value="1"> Questões de um determinado dispositivo </option>
                    <option value="1"> Questões de um determinado modelo de dispositivo </option>                    
                </select>                  
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success"> Pesquisar </button>
            </div>
        </form>    
    </section>
    

    <section class="container-fluid" style="max-width: 60%;margin: 0 auto;padding-top:50px;">  
        <table class="table table-striped">
                <thead>
                    <tr>
                        <!--<th scope="col">ID</th>-->
                        <th scope="col">Título da Questão </th>            
                        <th scope="col">Dispositivo </th>
                        <th scope="col">Votos para É um problema </th>
                        <th scope="col">Votos para Não é um problema </th>
                        <th scope="col"> Total </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($assessments as $assessment)
                    <tr>                    
                        <td>{{$assessment->title}}</td>   
                        <td>{{$assessment->device}}</td>   
                        <td>{{$assessment->yes}}</td>
                        <td>{{$assessment->no}}</td>
                        <td>{{$assessment->total}}</td>                                                    
                    </tr>           
                    @endforeach
                </tbody>
        </table>
    </section>    

   
    
</body>
</html>