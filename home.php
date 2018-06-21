<?php

session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>HOME</title>
</head>
<body>
	<h1>Seja bem vindo <?php echo $_SESSION['nome']; ?></h1>
	<a href="sair.php">Sair</a>
</body>
</html>
