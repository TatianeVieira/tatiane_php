<?php
    $host = 'localhost';
    $dbname = 'bd_imagens';
    $username = 'root';
    $password = '';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //verifica se o ID  foi passado na URL 
        if(isset($_GET['id'])) {
            $id = $_GET['id']; //obtem o ID do funcionario atravez da URL 

            //recuéra os dados do funcionario no banco de dados
            $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionario WHERE id=:id";
            $stmt = $pdo ->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); //VINCULA o valor do ID ao parametro :id
            $stmt->execute(); //executa a instrucao SQL

            //verifica se encontrou o funcionario
            if($stmt->rowCount()>0) {
                //A LINHA abaixo busca os dados dos funcionarios com um array associativo
                $funcionario = $stmt ->fetch(PDO::FETCH_ASSOC);

            //verifica se foi solicitado a exclusao do funcionario
            //linha abaixo verifica se os dados foram enviados via formulario com o metodo POST
            //ISSET verifica se ha um valor definido na variavel
            //verifica se o formulario foi enviado via POST  e se existe o campo EXCLUIR_ID 
            IF($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['excluir_id'])) {
                //a linha abaixo pega o valor ID que foi enviado pelo formulario(id_funcionario a ser excluido) com o ID correspondente
                $excluir_id = $_POST['excluir_id'];

                //monta a QUERY SQL para deletar o funcionario com o ID corrspondente
                $sql_excluir = "DELETE FROM funcionario WHERE id= :id";

                //prepara a QUERY para a execucao segura evitando SQL INJECTION
                $stmt_excluir = $pdo->prepare($sql_excluir);
                //associa o valor ID ao parametro QUERY garantindo que sera tratado como numero
                $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
                //executa a QUERY excluindo o funcionario do BD 
                $stmt_excluir->execute();

                header("Location: consulta_funcionario.php");
                exit();
            }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visualizar Funcionario</title>
</head>
<body>
    <h1>Dados do Funcionario</h1>
    <p>Nome: <?=htmlspecialchars($funcionario['nome'])?></p>
    <p>Telefone: <?=htmlspecialchars($funcionario['telefone'])?></p>
    <p>Foto:</p>
            <img src="data:<?$funcionario['tipo_foto']?>;base64,<?=base64_encode($funcionario['foto'])?>" alt="Foto do Funcionario"> 

            <!--Formulario para excluir funcionario-->
            <form method="POST">
                <input type="hidden" name="excluir_id" value="<?=$id?>">
                <button type="submit">Excluir Funcionario</button>
            </form>
</body>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</html>
<?php
            }else{
                echo "Funcionario nao encontrado";
            }
        }else{
            echo "ID do funcionario nao foi conhecido";
        }
    } catch(PDOException $e) {
        echo "Erro: ".$e->getMessage();
    }
?>