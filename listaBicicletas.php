<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Bicicletas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Lista de Bicicletas</h1>

    <?php
    include("connect.php");
    session_start();

    $sqlConsultaBicicletas = "SELECT id, tipo, aro, cor, valor FROM bicicleta"; // Corrigido o nome da tabela para minúsculo
    $result = $conn->query($sqlConsultaBicicletas);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Aro</th>
                    <th>Cor</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['tipo']}</td>
                    <td>{$row['aro']}</td>
                    <td>{$row['cor']}</td>
                    <td>{$row['valor']}</td>
                    <td>
                        <button class='edit-btn' onclick='editarBicicleta({$row['id']})'>Editar</button>
                        <button class='delete-btn' onclick='excluirBicicleta({$row['id']})'>Excluir</button>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhuma bicicleta cadastrada.";
    }

    $conn->close();
    ?>

    <script>
        function editarBicicleta(bikeId) {
            window.location.href = 'editar_bicicleta.php?id=' + bikeId;
        }

        function excluirBicicleta(bikeId) {
            var confirmacao = confirm('Deseja realmente excluir esta bicicleta?');

            if (confirmacao) {
                window.location.href = 'deletar_bicicleta.php?id=' + bikeId;
            }
        }
    </script>
</body>
</html>
