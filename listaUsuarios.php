<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
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
<body>
    <h1>Lista de Usuários</h1>

    <?php
    include("connect.php");
    session_start();


        $sqlConsultaUsuarios = "SELECT id, nome, cpf FROM cliente";
        $result = $conn->query($sqlConsultaUsuarios);

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
                            <button class='edit-btn' onclick='editarUsuario({$row['id']})'>Editar</button>
                            <button class='delete-btn' onclick='excluirUsuario({$row['id']})'>Excluir</button>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum usuário cadastrado.";
        }
    

    $conn->close();
    ?>

    <script>
        function editarUsuario(userId) {
            window.location.href = 'editar_usuario.php?id=' + userId;
        }

        function excluirUsuario(userId) {
            var confirmacao = confirm('Deseja realmente excluir este usuário?');

            if (confirmacao) {
                window.location.href = 'deletar_usuario.php?id=' + userId;
            }
        }
    </script>
</body>
</html>
