<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes de Bicicletas e Localizações</title>
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

    </style>
</head>
<body>
    <h1>Detalhes de Bicicletas e Localizações</h1>

    <?php
    include("connect.php");

    $sql = "SELECT b.id as bicicleta_id, b.tipo as tipo_bicicleta, b.valor as valor_bicicleta, l.id as localizacao_id, l.rua as rua_localizacao, l.bairro as bairro_localizacao
            FROM Bicicleta b
            INNER JOIN Localizacao_Bicicleta lb ON b.id = lb.id_bicicleta
            INNER JOIN Localizacao l ON lb.id_localizacao = l.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Bicicleta ID</th>
                    <th>Tipo de Bicicleta</th>
                    <th>Valor da Bicicleta</th>
                    <th>Localização ID</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['bicicleta_id']}</td>
                    <td>{$row['tipo_bicicleta']}</td>
                    <td>{$row['valor_bicicleta']}</td>
                    <td>{$row['localizacao_id']}</td>
                    <td>{$row['rua_localizacao']}</td>
                    <td>{$row['bairro_localizacao']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhuma bicicleta cadastrada.";
    }

    $conn->close();
    ?>
</body>
</html>
