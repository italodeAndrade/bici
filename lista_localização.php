<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Localizações</title>
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

table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2; /* Cor de fundo para o cabeçalho */
}

a {
    text-decoration: none;
    color: #3498db; /* Cor do link */
}

a:hover {
    text-decoration: underline;
}

input[type="submit"] {
    background-color: #e74c3c; /* Cor de fundo para o botão Excluir */
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #c0392b; /* Cor de fundo alterada ao passar o mouse */
}

    </style>
</head>
<body>
    <h1>Lista de Localizações</h1>

    <?php
    include("connect.php");

    $sql = "SELECT id, rua, bairro FROM Localizacao";
    $result = $conn->query($sql);
    ?>

    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['rua']}</td>
                        <td>{$row['bairro']}</td>
                        <td>
                            <a href='lista_edição_localização.php?id={$row['id']}'>Editar</a>
                            <form method='post' action=''>
                                <input type='hidden' name='delete_id' value='{$row['id']}'>
                                <input type='submit' name='delete' value='Excluir'>
                            </form>
                        </td>
                    </tr>";
            }
        }
        ?>
    </table>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $sqlDelete = "DELETE FROM Localizacao WHERE id = ?";
        $stmtDelete = $conn->prepare($sqlDelete);

        if ($stmtDelete) {
            $stmtDelete->bind_param("i", $delete_id);
            if ($stmtDelete->execute()) {
                echo "Localização excluída com sucesso!";
                // Atualizar a página após a exclusão
                echo "<script>window.location.reload();</script>";
            } else {
                echo "Erro ao excluir a localização: " . $stmtDelete->error;
            }
            $stmtDelete->close();
        } else {
            echo "Erro na preparação da declaração de exclusão: " . $conn->error;
        }
    }
    ?>
</body>
</html>
