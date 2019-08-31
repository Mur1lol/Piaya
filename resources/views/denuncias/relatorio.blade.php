<!DOCTYPE html>
<html lang="pt-BR">
    <head> 
        <title>Relatório</title>
    </head>
    <body>
        <h1> Relatório de Denuncias </h1>

        <table>
            <thead>
                <tr>
                	<th>Problema</th>
                	<th>Tipo</th>
                	<th>Lixeira</th>
                	<th>Acontecimento</th>
                	<th>Local</th>
                </tr>
            </thead>
            <tbody>
            @foreach($denuncias as $denuncia)
					<tr>
						<td>{{ $denuncia->problema }}</th>
						<td>{{ $denuncia->tipo }}</td>
						<td>{{ $denuncia->lixeira }}</td>
						<td>{{ $denuncia->acontecimento }}</td>
						<td>{{ $denuncia->local }}</td>
					</tr>
				@endforeach
            </tbody>
        </table>

        <br>
        <footer style="bottom: 0; left: 0; height: 40px; position: fixed; width: 100%;">
            <b>Copyright &copy; Murilo Brasil e Rafael Tesch - 2019</b>
        </footer>
    </body>
</html>
