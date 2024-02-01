<?php
include("connect.php");

session_start();

        $id = $_GET["id"];

        $sql = "DELETE FROM adm WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            ?>
            <script>
                alert('Locatario removido');
                location.href = 'listaLocatarios.php';
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

