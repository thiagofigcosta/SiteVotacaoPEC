<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/indexStl.css">
        <title></title>
    </head>
    <body>
        <?php
        if(count($_GET)){
            if($_GET['do']!='False'&&$_GET['do']!='True'){
                header("LOCATION:index.php");
            }else{
                $isDocente=($_GET['do']);
            }
        }else{
            header("LOCATION:index.php");
        }
        ?>
        <br/><br/>
        <form action="process.php" method="GET">
            <fieldset>
                <legend>Referente à PEC 241</legend>
                <input name="Nome" id="Nome" type="text" placeholder="Nome">
                <?php
                    if($isDocente=='True'){
                        echo '<input name="Codprof" id="Codprof" type="number" placeholder="Cod. Professor">';
                    }  else {
                        echo '<input name="Matricula" id="Matricula" type="number" placeholder="Matricula">';
                    }
                ?>
                <input name="Email" id="Email" type="text" placeholder="Email?">
                <fieldset id="ContraPec">
                    <legend>Contra a Pec?</legend>
                    <div id="radio"><input type="radio" value="Sim" name="ContraPec"> Sim
                    <input type="radio" value="Nao" name="ContraPec"> Não</div>
                </fieldset>
                <fieldset id="ContraGreve">
                    <legend>Contra Greve?</legend>
                    <div id="radio"><input type="radio" value="Sim" name="ContraGreve"> Sim
                    <input type="radio" value="Nao" name="ContraGreve"> Não</div>
                </fieldset>
                <fieldset id="ContraOcupacao">
                    <legend>Contra Ocupacao?</legend>
                    <div id="radio"><input type="radio" value="Sim" name="ContraOcupacao"> Sim
                    <input type="radio" value="Nao" name="ContraOcupacao"> Não</div>
                </fieldset>
                Ponderações:
                <textarea name="Ponderacoes" id="Ponderacoes" maxlength="300" value=""></textarea>
                <button type="submit" value="Enviar" readonly>Enviar</button>
                <?php
                echo '<input type="hidden" id="do" name="do" value='.$isDocente.' />';
                ?>
            </fieldset>
        </form>
    </body>
</html>
