<?php
echo "<br/>";
$AmazonProducts = array(
    array("codigo" => "livro", "descriçao" => "livros","preço" => 50),
    array("codigo" => "DVDs", "descriçao" => "filmes","preço" => 50),
    array("codigo" => "CDs", "descriçao" => "musica","preço" => 50),
);
for($linha = 0; $linha < 3; $linha++){ ?>
<p> | <?= $AmazonProducts[$linha]["codigo"]?>
    | <?= $AmazonProducts[$linha]["descriçao"]?>
    | <?= $AmazonProducts[$linha]["preço"]?>
</p>
<?php
}
?>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>