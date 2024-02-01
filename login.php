<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    text-align: center;
}

h1 {
    color: #e67e22; /* Laranja */
}

form {
    margin-top: 20px;
}

table {
    margin: 0 auto;
}

td {
    text-align: right;
    width: 100px;
    padding-right: 10px;
}

.input-container {
    text-align: center;
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #3498db; /* Azul */
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #2980b9; /* Azul mais escuro ao passar o mouse */
}

    </style>
</head>
<body>
    <h1>Página de Login</h1>
    <form name="form1" method="post" action="login_exe.php">
        <table align="center">
            <tr>
                <td style="text-align: right; width: 50px;">Login:</td>
                <td>
                    <input type="text" name="txtNome">
                </td>
            </tr>
            <tr>
                <td style="text-align: right; width: 50px;">Senha:</td>
                <td>
                    <input type="password" name="senha">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="input-container">
                    <input type="submit" value="Enviar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
