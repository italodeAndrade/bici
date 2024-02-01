<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Bicicleta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Editar Bicicleta</h1>

    <?php
    include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM bicicleta WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $bike = $result->fetch_assoc();

            echo "<form method='post' action=''>
                    <input type='hidden' name='id' value='{$bike['id']}'>
                    <label for='tipo'>Tipo:</label>
                    <input type='text' name='tipo' value='{$bike['tipo']}'><br>
                    <label for='aro'>Aro:</label>
                    <input type='text' name='aro' value='{$bike['aro']}'><br>
                    <label for='cor'>Cor:</label>
                    <input type='text' name='cor' value='{$bike['cor']}'><br>
                    <label for='valor'>Valor:</label>
                    <input type='text' name='valor' value='{$bike['valor']}'><br>
                    <input type='submit' value='Salvar Alterações'>
                </form>";
        } else {
            echo "Erro na preparação da declaração: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $aro = $_POST['aro'];
        $cor = $_POST['cor'];
        $valor = $_POST['valor'];

        $sqlUpdate = "UPDATE bicicleta SET tipo = ?, aro = ?, cor = ?, valor = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);

        if ($stmtUpdate) {
            $stmtUpdate->bind_param("ssdsi", $tipo, $aro, $cor, $valor, $id);
            if ($stmtUpdate->execute()) {
                echo "Bicicleta atualizada com sucesso!";
                echo "<script>window.location.href='listaBicicletas.php';</script>";
            } else {
                echo "Erro ao atualizar a bicicleta: " . $stmtUpdate->error;
            }
            $stmtUpdate->close();
        } else {
            echo "Erro na preparação da declaração de atualização: " . $conn->error;
        }
    }
    ?>
</body>
</html>
