<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Administradores</title>
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

        th {
            background-color: #f2f2f2;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Lista de Locatarios</h1>

    <?php
    include("connect.php");
    session_start();

    $sqlConsultaAdms = "SELECT id, nome, cpf FROM adm";
    $result = $conn->query($sqlConsultaAdms);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['cpf']}</td>
                    <td>
                        <button class='edit-btn' onclick='editarAdm({$row['id']})'>Editar</button>
                        <button class='delete-btn' onclick='excluirAdm({$row['id']})'>Excluir</button>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum administrador cadastrado.";
    }

    $conn->close();
    ?>

    <script>
        function editarAdm(admId) {
            window.location.href = 'editar_locador.php?id=' + admId;
        }

        function excluirAdm(admId) {
            var confirmacao = confirm('Deseja realmente excluir este administrador?');

            if (confirmacao) {
                window.location.href = 'deletar_locador.php?id=' + admId;
            }
        }
    </script>
</body>
</html>
