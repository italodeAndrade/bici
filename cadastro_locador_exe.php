<?php
include("connect.php");

$nome = $_POST["txtNome"];
$senha = $_POST["senha"];
$cpf = $_POST["txtCPF"];
$dtNascimento = $_POST["dt_nascimento"];

$sql = "INSERT INTO adm(nome, senha, cpf, dt_nascimento) VALUES('$nome', '$senha', '$cpf', '$dtNascimento')";
$result = $conn->query($sql);

if ($result === TRUE) {
    ?>
    <script>
        alert('Locatario cadastrado');
        location.href = 'telaADM.php';
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
