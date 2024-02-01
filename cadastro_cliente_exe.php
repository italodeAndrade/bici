<?php
include("connect.php");

$nome = $_POST["txtNome"];
$senha = $_POST["senha"];
$cpf = $_POST["txtCPF"];
$dtNascimento = $_POST["dt_nascimento"];

$sql = "INSERT INTO cliente(nome, senha, cpf, dt_nascimento) VALUES('$nome', '$senha', '$cpf', '$dtNascimento')";
$result = $conn->query($sql);

if ($result === TRUE) {
    ?>
    <script>
        alert('Cliente cadastrado');
        location.href = 'listaBicicletas.php';
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Erro no cadastro');
        history.go(-1);
    </script>
    <?php
}
?>


