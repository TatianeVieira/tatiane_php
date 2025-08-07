<?php
//
    $host = 'localhost';
    $dbname = 'bd_imagens';
    $username = 'root';
    $password = '';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //recupera todos os func do banco de dados
        $sql= "SELECT id, nome FROM funcionario";
        $stmt = $pdo->prepare($sql); //prepara a instrução SQL para execucao
        $stmt -> execute(); //executa a instrucao SQL
        $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //BUSCA TODOS OS RESULTADOS COMO UMA MATRIZ ASSOCIATIVA

        //verifica se foi solicitado a exclusao de uma funcionario
        if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['excluir_id'])){
            $excluir_id = $_POST['excluir_id'];
            $sql_excluir = "DELETE FROM funcionario WHERE id = :id";
            $stmt_excluir = $pdo->prepare($sql_excluir);
            $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
            $stmt_excluir->execute();

            //redireciona para evitar reenvio do formulario
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    } catch(PDOException $e){
        echo "Erro: ".$e->getMessage(); //exibe a msg de erro se a conexao ou a consulta falhar
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Funcionario</title>
</head>
<body>
    <h1>Consulta de Funcionario</h1>
    
    <ul>
        <?php foreach($funcionarios as $funcionario): ?>
            <li>
            <!--A linha abixo exibe o link para visualizar os detalhes do funcionario com base no id-->
                <a href="visualizar_funcionario.php?id=<?$funcionario['id']?>">
                <!--A linha abixo exibe o nome do funcionario-->
                    <?=htmlespecialchars($funcionario['nome'])?>
                </a>
                <!--formulario para excluir funcionarios-->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="excluir_id" value="<?=$funcionario['id']?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>