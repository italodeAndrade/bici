<?php
include("connect.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM bicicleta WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            ?>
            <script>
                alert('Bicicleta removida');
                location.href = 'listaBicicletas.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Erro ao deletar a bicicleta');
                history.go(-1);
            </script>
            <?php
        }

        $stmt->close();
    } else {
        ?>
        <script>
            alert('Erro na preparação da declaração');
            history.go(-1);
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Requisição inválida');
        history.go(-1);
    </script>
    <?php
}

$conn->close();
?>
