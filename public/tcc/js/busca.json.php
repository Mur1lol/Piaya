<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "trabalho";

	$con = mysqli_connect($servidor, $usuario, $senha, $bd);
	// mysqli_select_db($con, $bd);

//------------------------------------------------------------------------------------------------------------

	$filtro = "";
	if (isset($_GET["filtro"])) {
		$filtro = $_GET["filtro"];
	}

	if ($filtro == "") {
		$query = ("SELECT * FROM denuncias");
	}
	else {
		$query = ("SELECT * FROM denuncias WHERE denuncias.problema LIKE '%$filtro%' OR denuncias.tipo LIKE '%$filtro%' OR denuncias.lixeira LIKE '%$filtro%' OR denuncias.acontecimento LIKE '%$filtro%' OR denuncias.local LIKE '%$filtro%' ORDER BY denuncias.problema");
	}

	$result= mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	$json = array();

	if($numrows > 0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$id = $row['id'];
	        $problema = $row['problema'];
			$tipo = $row['tipo'];
			$lixeira = $row['lixeira'];
			$acontecimento = $row['acontecimento'];
			$local = $row['local'];

			$json[] = array(
				'id' => $id,
				'problema' => $problema,
				'tipo' => $tipo,
				'lixeira' => $lixeira,
				'acontecimento' => $acontecimento,
				'local' => $local
			);
		}
	}
	else
	{
	    $json[] = array();
	}

	echo json_encode($json);

?>