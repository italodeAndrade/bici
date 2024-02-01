<?php
session_start();
include("connect.php");

$login = $_POST["txtNome"];
$password = $_POST["senha"];

$sql = "SELECT nome, senha FROM adm WHERE nome = '$login'";
$result = $conn->query($sql);

if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Login: " . $login . "<br>";
    echo "Senha digitada: " . $password . "<br>";

    if (isset($row["senha"]) && password_verify($password, $row["senha"])) {
        $_SESSION["nome"] = $row["nome"];
        header("Location: telaADM.php");
        exit();
    } else {
        $error_message = "Senha incorreta";
    }
} else {
    $error_message = "Usuário não encontrado";
}

if (isset($error_message)) {
    echo "Erro: " . $error_message;
} else {
    echo "Redirecionamento falhou. Verifique as configurações do servidor.";
}
?>
