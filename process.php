<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(count($_GET)){
            if($_GET['do']!='False'&&$_GET['do']!='True'){
                header("LOCATION:index.php");
            }else{
                $isDocente=($_GET['do']);
                
                if(!(isset($_GET['Codprof'])||isset($_GET['Matricula']))||(empty($_GET['Matricula'])&&empty($_GET['Codprof']))||
                   !isset($_GET['ContraPec'])|| empty($_GET['ContraPec'])||
                   !isset($_GET['ContraGreve'])|| empty($_GET['ContraGreve'])||
                   !isset($_GET['ContraOcupacao'])|| empty($_GET['ContraOcupacao'])||
                   !isset($_GET['Nome'])|| empty($_GET['Nome'])){
                    header("LOCATION:vote.php?do=".$isDocente); 
                }else{
                    $pec=$_GET['ContraPec'];
                    $greve=$_GET['ContraGreve'];
                    $ocupacao=$_GET['ContraOcupacao'];
                    $nome=$_GET['Nome'];
                    $email=$_GET['Email'];
                    $prof=$_GET['Codprof'];
                    $aluno=$_GET['Matricula'];
                    $obs=$_GET['Ponderacoes'];
                }
                
                if(strToBool($isDocente)){
                    $pessoa=new Docente;
                    $pessoa->setCodsetCodProf($prof);
                    //TODO:verficicar validade dos dados, caso invalido fazer popup
                }else{
                    $pessoa=new Discente;
                    $pessoa->setMatricula($aluno);
                    //TODO:verficicar validade dos dados, caso invalido fazer popup
                }
                $pessoa->setContraGreve($greve);
                $pessoa->setContraOcupacao($ocupacao);
                $pessoa->setContraPec($pec);
                $pessoa->setNome($nome);
                $pessoa->setPonderacoes($obs);
                
            }
        }else{
            header("LOCATION:index.php");
        }
        
        function strToBool($str){
            if (strtolower($str) == 'false') {
                return false;
            }
            return true;
        }
        
        ?>
    </body>
</html>
