<?php
//habilita relatorios detalhados ded erros 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**fruncao para conectar ao banco de dados, retorna um objeto de conexao MYSQLI ou interrompe o script em caso de erro. */
function conectadb() {
    //configuracao d bd
    $endereco = "localhost"; 
    $usuario = "root"; 
    $senha = "";
    $banco = "empresa";
}

try {
    $con = new sqli($endereco, $usuario, $senha, $banco);

    $con->set_charset("utf8mb4");
    return $con;
    } catch(Exception $e){
        die("erro na conexao: ".$e->getMessage());
    }
?>