@extends('layouts/template')

@section('conteudo')

<form name="frmBusca" method="GET" action="tcc/js/busca.json.php" >
    <input type="text" name="palavra" />
    <input type="submit" value="Buscar" />
</form>
 
<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
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
				denuncias
			WHERE
				denuncias.problema LIKE '%$filtro%'
			ORDER BY
				denuncias.problema
		";

	echo json_encode($query);
?>
@endsection