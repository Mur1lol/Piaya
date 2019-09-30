<!DOCTYPE html>
<html lang="pt-BR">
    <head> 
        <title>Relatório</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="tcc/css/estilo.css">
    </head>
    <body>
        @if (Auth::user()->adm != 1)
            <div class="alert alert-danger text-center" role="alert">
                <strong>Está é uma função disponivel apenas para o Administrador!</strong>
            </div>
        @else
        <div class="jumbotron" style="background-color: #a9ff85; padding: 25px;">
            <img src="https://admin.googleusercontent.com/logo-scs-key1103327" style="width: 200px;">
            <h2 style="float: right;position: relative;top: 25px;">Relatório de Denuncias</h2>
        </div>
        <br>


        <div class="table-responsive">
            <table class="table table-bordered table-dark text-center" >
                <thead class="" id="titulo">
                    <tr style="background-color: #a9ff85;">
                        <th scope="col">Problema</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Lixeira</th>
                        <th scope="col">Acontecimento</th>
                        <th scope="col">Local</th>
                    </tr>
                </thead>
                <tbody class="denuncias" >
                @foreach($denuncias as $denuncia)
                    <tr>
                        <td scope="row">{{ $denuncia->problema }}</td>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        <br>
        <footer class="py-2 text-center footer" style="background-color: #a9ff85; padding: 25px;">
            <b class="m-0">Murilo Brasil e Rafael Tesch - 2019</b>
        </footer>
        @endif
    </body>
</html>
