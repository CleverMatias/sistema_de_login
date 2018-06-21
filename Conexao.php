<?php

require_once 'config.php';

// Conectando
$con = new mysqli(HOST, USER, SENHA, BASE);

// Testando a conexão
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}
