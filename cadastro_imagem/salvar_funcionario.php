<?php
//funcao para redimencionar a imagem
function redimencionarImagem($imagem, $largura, $altura) {
    //obtem as dimensoes originais da imagem
    //getimagenssiza()  retorna a largura e a altura de uma imagem
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    //cria uma nova imagem em branco com as novas dimensoes
    //imagecreatetruecolor() cria uma nova imagem em branco em alta qualidade
    $novaImagem = imagecreatetruecolor($largura, $altura);

    //carrega a imagem original a partir do arquivo
    //imagecreatefromjpeg() cria uma imagem PHP a partir de um jpeg
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //copia e redimencia a imagem original para a nova
    //imagecopyresampled() copia com redimencionamente e suavizacao
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    //inicia com buffer para guardar a imagem com texto
    //ob_star() inicia p output buffering guardandp a saida
    ob_start();

    //imagejpeg() envia a imagem para o output
    imagejpeg($novaImagem);

    //ob_get_clean pega o conteudo do buffer e limpa
    $dadosImagem = ob_get_clean();

    //libera a memoria usada pelas imgs
    //imagedestroy() limpa a memoria da imagem criada
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    //retorna a image redimensionada em formato 
    return $dadosImagem;
}

    //config do banco de dados
    $host = 'localhost';
    $dbname = 'bd_imagens';
    $username = 'root';
    $password = '';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //verifica se tem o arquivo foto 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {

            if($_FILES['foto']['error']==0){
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $nomeFoto = $_FILES['foto']['name'];
                $tipofoto = $_FILES['foto']['type'];

                //redimensiona a imagem
                $foto = redimencionarImagem($_FILES['foto']['tmp_name'], 300, 400); //tpm_name é o caminho temporario

                //insere no banco dados usando sql
                $sql = "INSERT INTO funcionario (nome, telefone, nome_foto, tipo_foto, foto) values(:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
                $stmt = $pdo->prepare($sql); //prepara a query para evitar ataque
                $stmt->bindParam(':nome', $nome); //liga os parametros as variaveis
                $stmt->bindParam(':telefone', $telefone); //liga os parametros as variaveis
                $stmt->bindParam(':nome_foto', $nomeFoto); //liga os parametros as variaveis
                $stmt->bindParam(':tipo_foto', $tipoFoto); //liga os parametros as variaveis
                $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB); //lob = large object

                if($stmt->execute()) {
                    echo "Funcionario cadastrado com sucesso";
                }else{
                    echo "Erro ao cadastrar o funcionario";
                }
            }else{
                echo "Erro ao fazer o UPLOAD da foto codigo:".$_FILES['foto']['error'];
            }
        }
    }catch(PDOException $e){
        echo "Erro" .$e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de imagem</title>
</head>
<body>
    <h1>Lista de imagem</h1>
    <a href="consulta_funcionario.php">Listar Funcionario</a>
</body>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</html>