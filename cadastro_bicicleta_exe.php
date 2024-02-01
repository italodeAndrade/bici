<?php
    include("connect.php");

        $tipo = $_POST["txtTipoBicicleta"];
        $aro = $_POST["txtAroBicicleta"];
        $cor = $_POST["txtCorBicicleta"];
        $valor = $_POST["txtValorBicicleta"];
       
        $sql = "INSERT INTO Bicicleta (tipo, aro, cor, valor) values('{$tipo}','{$aro}','{$cor}',
        '{$valor}')";
        $result = $conn->query($sql);

    if ($result === TRUE) {
        ?>
        <script>
            alert('Bicicleta cadastrada');
            location.href = 'telaADM.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Erro no cadastro');
            history.go(-1);
        </script>
        <?php
}
?>
