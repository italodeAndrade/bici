<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Localização</title>
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
    color: #e67e22; /* Laranja */
}

form {
    width: 300px;
    margin: 0 auto;
}

input[type="text"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #27ae60;
}

    </style>
</head>
<body>
    <h1>Editar Localização</h1>

    <?php
    include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT id, rua, bairro FROM Localizacao WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $localizacao = $result->fetch_assoc();


            echo "<form method='post' action=''>
                    <input type='hidden' name='id' value='{$localizacao['id']}'>
                    Rua:<br>
                    <input type='text' name='rua' value='{$localizacao['rua']}'><br>
                    Bairro:<br>
                    <input type='text' name='bairro' value='{$localizacao['bairro']}'><br>
                    <input type='submit' value='Salvar Alterações'>
                </form>";
        } else {
            echo "Erro na preparação da declaração: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];

        $sqlUpdate = "UPDATE Localizacao SET rua = ?, bairro = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);

        if ($stmtUpdate) {
            $stmtUpdate->bind_param("ssi", $rua, $bairro, $id);
            if ($stmtUpdate->execute()) {
                echo "Localização atualizada com sucesso!";
                // Redirecionar para a página de lista após a edição
                echo "<script>window.location.href='listar_localizacao.php';</script>";
            } else {
                echo "Erro ao atualizar a localização: " . $stmtUpdate->error;
            }
            $stmtUpdate->close();
        } else {
            echo "Erro na preparação da declaração de atualização: " . $conn->error;
        }
    }
    ?>
</body>
</html>
