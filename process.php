<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once('Discente.php');
        include_once('Docente.php');
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
                    alert('Faltando argumentos',"vote.php?do=".$isDocente);
                }else{
                    $pec=$_GET['ContraPec'];
                    $greve=$_GET['ContraGreve'];
                    $ocupacao=$_GET['ContraOcupacao'];
                    $nome=$_GET['Nome'];
                    $email=$_GET['Email'];
                    if(isset($_GET['Codprof'])){
                        $prof=$_GET['Codprof'];
                    }else{ 
                        $aluno=$_GET['Matricula'];
                    }
                    $obs=$_GET['Ponderacoes'];
                
                
                if(strToBool($isDocente)){
                    $pessoa=new Docente;
                    $pessoa->setCodProf($prof);
                    $number=$pessoa->getCodProf();
                    $file='res/id.profs';
                    $ext='.profs';
                }else{
                    $pessoa=new Discente;
                    $pessoa->setMatricula($aluno);
                    $number=$pessoa->getMatricula();
                    $file='res/id.matric';
                    $ext='.aluns';
                }
                
                $handle = fopen($file, "r");
                if ($handle) {
                    $isCefet=false;
                    while (($line = fgets($handle)) !== false) {                        
                        if(chop($line)==$number){#chop tira o /n
                            $isCefet=true;
                        }
                        if($isCefet){
                            break;
                        }
                    }
                    if(!$isCefet){
                        alert("Numero de id errado:".$number,'vote.php?do='.$isDocente);
                    }
                    fclose($handle);
                } else { 
                    alert("erro ao carregar arquivo","index.php");
                } 
                
                $pessoa->setContraGreve($greve);
                $pessoa->setContraOcupacao($ocupacao);
                $pessoa->setContraPec($pec);
                $pessoa->setNome($nome);
                $pessoa->setPonderacoes($obs);
                
                $writeFile = fopen("requeriments/".$number.$ext, "w");
                if($writeFile==NULL){
                    alert('Falha ao gravar arquivo','index.php');
                }else{
                    fwrite($writeFile, ($pessoa->getContraGreve()) ? "true\n" : "false\n");
                    fwrite($writeFile, ($pessoa->getContraOcupacao()) ? "true\n" : "false\n");
                    fwrite($writeFile, ($pessoa->getContraPec()) ? "true\n" : "false\n");
                    fwrite($writeFile, $pessoa->getPonderacoes()."\n");
                    fwrite($writeFile, $pessoa->getNome()."\n");
                    fclose($writeFile);
                    
                    $message = "Nós agradecemos pela sua votação\nVocê esta fazendo o FECET-GM um lugar melhor para todos\nVLW <3\nAss. Thiago";
                    $headers = 'From: cefet@nanotechcorp.com'."\r\n".'Reply-To: cefet@nanotechcorp.com'."\r\n".'X-Mailer: PHP/'.phpversion();
                    mail($email, 'Obrigado por ajudar o CEFET', $message, $headers);
                    alert("Enviado com sucesso","index.php");
                }
              }  
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
        
        function alert($msg,$link) {
            if($link!=''){
            echo (" <SCRIPT LANGUAGE='JavaScript'>
                        window.alert('$msg')
                        window.location.href='$link';
                    </SCRIPT>
                    <NOSCRIPT>
                        <a href='$link'>$msg. Clique aqui se não for redirecionado.</a>
                    </NOSCRIPT>");
            }else{
                echo (" <SCRIPT LANGUAGE='JavaScript'>
                        window.alert('$msg')
                    </SCRIPT>");
            }
        }
        
        ?>
    </body>
</html>
