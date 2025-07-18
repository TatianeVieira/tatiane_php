<?php
    foreach(file("livros.txt") as $livros) {
        list($titulo, $autor) = explode(",", $livros);
?>
    <p>titulo: <?= $titulo ?>, autor: <?= $autor ?> </p>
<?php
    }
?>