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
		$query = ("
			SELECT DISTINCT denuncias.*, IF(user_id = users.id,name, 'Anonimo') as usuario 
			FROM denuncias, users 
			WHERE user_id is NULL AND denuncias.status = 0
			OR user_id = users.id AND denuncias.status = 0"
		);
	}
	else {
		$query = ("
			SELECT DISTINCT denuncias.*, IF(user_id = users.id,name, 'Anonimo') as usuario 
			FROM denuncias, users 
			WHERE denuncias.problema LIKE '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR denuncias.problema LIKE '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			OR denuncias.tipo LIKE '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR denuncias.tipo LIKE '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			OR denuncias.lixeira LIKE '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR denuncias.lixeira LIKE '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			OR denuncias.acontecimento LIKE '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR denuncias.acontecimento LIKE '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			OR denuncias.local LIKE '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR denuncias.local LIKE '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			OR users.name like '%$filtro%' AND user_id = users.id AND denuncias.status = 0
			OR users.name like '%$filtro%' AND user_id is NULL AND denuncias.status = 0

			ORDER BY denuncias.local"
		);
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
			$usuario = $row['usuario'];

			$json[] = array(
				'id' => $id,
				'problema' => $problema,
				'tipo' => $tipo,
				'lixeira' => $lixeira,
				'acontecimento' => $acontecimento,
				'local' => $local,
				'usuario' => $usuario
			);
		}
	}
	else
	{
	    $json[] = array();
	}

	echo json_encode($json);

?>