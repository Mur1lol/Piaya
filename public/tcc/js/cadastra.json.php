<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "trabalho";

	$conn = new mysqli($servidor, $usuario, $senha, $bd);

//------------------------------------------------------------------------------------------------------------

	$problema;
	$tipo;
	$lixeira;
	$acontecimento;
	$local;

	if (isset($_GET["problema"])) {
		$problema = $_GET["problema"];
	}
	if (isset($_GET["tipo"])) {
		$tipo = $_GET["tipo"];
	}
	if (isset($_GET["lixeira"])) {
		$lixeira = $_GET["lixeira"];
	}
	if (isset($_GET["acontecimento"])) {
		$acontecimento = $_GET["acontecimento"];
	}
	if (isset($_GET["local"])) {
		$local = $_GET["local"];
	}

	$json = array();	

    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local, status) 
			VALUES ('$problema', '$tipo', '$lixeira', '$acontecimento', '$local', 0)";

    if (mysqli_query($conn, $sql)) {
       $json = array('mensagem' => 'Denuncia cadastrada com sucesso');
    } else {
       $json = array('mensagem' => 'Erro ao cadastrar');
    }
    $conn->close();

    // header('Content-Type: application/json');
	echo json_encode($json);

?>