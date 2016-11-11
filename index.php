<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/indexStl.css">
        <title>Votacao PEC</title>
    </head>
    <body bgcolor="#9070cd">
        <?php
        echo "<h2>O que você acha da PEC 241?</h2>";
        echo "<h4>Nós queremos saber o que você aluno/professor do CEFET-MG,";
        echo "acha sobre a PEC, por favor clique em docente/discente,";
        echo "e compartilhe sua opnião, ajude a fazer uma faculdade melhor.</h4><br/>";
        echo '<form action=vote.php method="GET">';
        echo '<br/><br/><br/><br/><br/><br/><br/><br/>';
        echo '<button id="docente"  name="do" value="True"readonly/>Docente';
        echo '<button id="discente" name="do" value="False"readonly/>Discente';
        echo '</form>';
        ?>        
    </body>
</html>