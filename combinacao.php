<html>
    <body>
        <?php
            //funcao usada para definir fuso horario padrao
            date_default_timezone_set('America/Los_Angeles');
            //Manipulando HTML e PHP
            $data_hoje = date ("d/m/y", time());
        ?>
        <p align="center"> Hoje é dia <?php echo $data_hoje;  ?>
        </p>
    </body>
</html>