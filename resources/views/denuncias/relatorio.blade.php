<!DOCTYPE html>
<html lang="pt-BR">
    <head> 
        <title>Relatório</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="tcc/css/estilo.css">
    </head>
    <body>
        <h2 class="text-center bg-success text-white" style="padding: 25px;">Relatório de Denuncias</h2>
        <br>
        
        <div class="table-responsive">
            <table class="table table-bordered table-dark text-center">
                <thead class="thead-dark" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Problema</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Lixeira</th>
                        <th scope="col">Acontecimento</th>
                        <th scope="col">Local</th>
                    </tr>
                </thead>
                <tbody class="denuncias" style="font-size: 10px;">
                @foreach($denuncias as $denuncia)
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
                        <td>{{ $denuncia->tipo }}</td>
                        <td>{{ $denuncia->lixeira }}</td>
                        <td>{{ $denuncia->acontecimento }}</td>
                        <td>{{ $denuncia->local }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $denuncia->problema }}</th>
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
        <footer class="py-2 bg-success text-center footer">
            <div class="container">
                <b class="m-0 text-center text-white">Copyright &copy; Murilo Brasil e Rafael Tesch - 2019</b>
            </div>
        </footer>
    </body>
</html>
