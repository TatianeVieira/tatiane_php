<?php
require_once('conecta.php');

//obter os dados enviados pelo formulario
$evento=$_POST['evento'];
$descricao=$_POST['descricao'];
$imagem=$_FILES['imagem']['tmp_name'];
$tamanho=$_FILES['imagem']['size'];
$tipo=$_FILES['imagem']['type'];
$nome=$_FILES['imagem']['name'];

//verifica se o arquivo foi enviado corretamente
if(!empty($imagem)&& $tamanho>0){
    //le o conteudo do arquivo
    $fp = fopen($imagem, "rp");
    $conteudo = fread($fp,filesize($imagem));
    fclose($fp);

    //protege contra problemas de caracteres no SQL
    $conteudo=mysqli_real_escape_string($conexao,$conteudo);

    $queryInsercao = "INSERT INTO imagens(evento,descricao,nome_imagem,tamanho_imagem,tipo_imagem,imagem) 
    values('$evento', '$descricao', '$nome', '$tamanho', '$tipo', '$conteudo')";
    $resultado=mysqli_query($conexao, $queryInsercao);

    //verifica de  INSERCAO FOI BEM UCEDIDA
    if($resultado){
        echo 'Registro inserido com sucesso!';
        header('Location: index.php');
        exit();
    }else{
        die("Erro ao inserir no banco: ".mysqli_error($conexao));
    }
}else{
    echo "Erro: nenhuma imagem foi inserida";
}

?>