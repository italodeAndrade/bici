<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página ADM</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    text-align: center;
}

h1 {
    color: #e67e22; /* Laranja */
}

p {
    margin-bottom: 20px;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #3498db; /* Azul */
    transition: color 0.3s ease-in-out;
}

a:hover {
    color: #2980b9; /* Azul mais escuro ao passar o mouse */
}

    </style>
</head>
<body>
    <h1>Bem-vindo à Página do Administrador</h1>
    
    <p>Escolha uma opção:</p>
    
    <ul>
        <li><a href="listaUsuarios.php">Ver lista de Clientes cadastrados</a></li>
        <li><a href="listaBicicletas.php">Ver lista de Bicicletas cadastradas</a></li>
        <li><a href="listaLocatarios.php">Ver lista de Locatarios cadastradas</a></li>
        <li><a href="cadastro_bicicleta.php">Cadastrar nova Bicicleta</a></li>
        <li><a href="cadastro_locador.php">Cadastrar novo Locador</a></li>
    </ul>
</body>
</html>
