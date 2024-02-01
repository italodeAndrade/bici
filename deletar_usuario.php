<?php
include("connect.php");

session_start();

        $id = $_GET["id"];

        $sql = "DELETE FROM cliente WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            ?>
            <script>
                alert('Usuário removido');
                location.href = 'listaUsuarios.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Erro ao deletar');
                history.go(-1);
            </script>
            <?php
        }

?>
