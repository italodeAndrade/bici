<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Página Inicial</title>
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
    <h1>Bem-vindo à Página Inicial do Alugue Já</h1>
    
    <p>Escolha uma opção:</p>
    
    <ul>
        <li><a href="cadastro_cliente.php">Novo Cliente</a></li>
        <li><a href="cadastro_locador.php">Novo Locador</a></li>
        <li><a href="login.php">Login Cliente/ADM</a></li>
    </ul>
</body>
</html>
