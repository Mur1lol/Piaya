<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$bd = "trabalho";

	$con = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($con, $bd);

	$filtro = "";
	if (isset($_GET["filtro"]))
		$filtro = $_GET["filtro"];

	$dados = [];

	$query = "
			SELECT
				*
			FROM
				temporadas
			WHERE
				temporadas.descricao LIKE '%$filtro%'
			ORDER BY
				temporadas.descricao
		";

	while ($registro = mysqli_fetch_assoc($query)) {
		$id = $registro['id'];
		$descricao = $registro['descricao'];

		$dados[] = ['id' => $id, 'descricao' => $descricao];
	}

	echo json_encode($dados);
?>