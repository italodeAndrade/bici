<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
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
    <h1>Editar Usuário</h1>

    <?php
    include("connect.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id, nome, cpf FROM cliente WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            echo "<form method='post' action=''>
                    <input type='hidden' name='id' value='{$user['id']}'>
                    <label for='nome'>Nome:</label>
                    <input type='text' name='nome' value='{$user['nome']}'><br>
                    <label for='cpf'>CPF:</label>
                    <input type='text' name='cpf' value='{$user['cpf']}'><br>
                    <input type='submit' value='Atualizar'>
                </form>";
        } else {
            echo "Erro na preparação da declaração: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];

        $sqlUpdate = "UPDATE cliente SET nome = ?, cpf = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);

        if ($stmtUpdate) {
            $stmtUpdate->bind_param("ssi", $nome, $cpf, $id);
            if ($stmtUpdate->execute()) {
                echo "Usuário atualizado com sucesso!";
                echo "<script>window.location.href='listaUsuarios.php';</script>";
            } else {
                echo "Erro ao atualizar o usuário: " . $stmtUpdate->error;
            }
            $stmtUpdate->close();
        } else {
            echo "Erro na preparação da declaração de atualização: " . $conn->error;
        }
    }
    ?>
</body>
</html>
