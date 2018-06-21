<?php

// Campos passados via Post de cadastrar.php
$nome = $sobrenome = $email = $pass = $submit = '';

// Em caso de campo vazio retorna para o formulário
if (empty($_POST['nome']) || empty($_POST['sobrenome'] || empty($_POST['email'])) || empty($_POST['pass'])) {
    header('Location: cadastrar.php?erro=campo_sem_preencher');
    exit();
}

// Validação propriamente dita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = testInput($_POST['nome']);
    $sobrenome = testInput($_POST['sobrenome']);
    $email = validaEmail(testInput($_POST['email']));
    $pass = validaSenha(testInput($_POST['pass']));
    $submit = testInput($_POST['submit']);

    // Registrando na base de dados
    require_once 'Conexao.php';

    // Checando se usuário já exite na base de dados
    print_r($nome);
    $qry = "select * from pessoas where nome='$nome' and sobrenome='$sobrenome'";
    $result = $con->query($qry);
    if ($result->num_rows > 0) {
        header('Location: cadastrar.php?erro=usuario_ja_existe');
        exit();
    }

    // Registrando usuário
    $qry = "INSERT INTO pessoas (nome, sobrenome, email, senha) values('$nome', '$sobrenome','$email','$pass')";
    if ($con->query($qry) === true) {
        $_SESSION['nome'] = $nome;
        header('Location: home.php');
        exit();
    } else {
        die('algo deu errado! ' . $con->error);
    }
} else {
    header('Location: cadastrar.php?erro=acesso_direto');
    exit();
}

// Retorna campo validado utilizado para campos com mesmas características, ou seja, todos os campos que tiverem validações comuns
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
}

// Valida email
function validaEmail($data)
{
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return $data;
    } else {
        header('Location: cadastrar.php?erro=email_invalido');
        exit();}
}

// Valida o tamanho da senha pra não ser menor que 6 caracteres e cria um hash ainda falta *** criar um meio de obrigar caracteres especiais, números e letra maiúscula
function validaSenha($senha)
{
    switch ($senha) {
        case strlen($senha) < 6:
            header('Location: cadastrar.php?erro=senha_curta');
            break;
        case (preg_match("/\W/", $senha) == false):
            header('Location: cadastrar.php?erro=senha_carac_espec');
            break;
        default:
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            return $senha;
            break;
    }
}
