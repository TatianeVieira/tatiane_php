<?php
    if (isset($_POST["enviar"]))
    {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        echo "recebido $usuario e $senha <br/>";
        $cripto = MD5($senha);
        echo "criptografada $cripto";
    }
?>