<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/indexStl.css">
        <title></title>
    </head>
    <body>
        <br/><br/><br/>
        <?php
        $allComents='';
        $pec=0;
        $greve=0;
        $ocupacao=0;
        $total=0;
        if (is_dir('requeriments/')) {
            if ($dir = opendir('requeriments/')) {
                while (($file = readdir($dir)) !== false) {
                    if($file!='.'&&$file!='..'){
                        $handle = fopen('requeriments/'.$file, "r");
                        if ($handle) {
                            if(strtolower(chop(fgets($handle)))=="true"){
                                $pec++;
                            }
                            if(strtolower(chop(fgets($handle)))=="true"){
                                $greve++;
                            }
                            if(strtolower(chop(fgets($handle)))=="true"){
                                $ocupacao++;
                            }
                            $allComents = $allComents."<br/><br/>".fgets($handle);
                            fclose($handle);
                            $total++;
                        } else { 
                            alert("erro ao carregar arquivo","");
                        } 
                    }
                }
                closedir($dir);
            }
        }
        echo '<h1>Resultado:</h1>';
        echo '<h4>Votos a contra a PEC: '.($pec/$total*100).'%<br/>';
        echo 'Votos a contra a Greve: '.($greve/$total*100).'%<br/>';
        echo 'Votos a contra a Ocupacao: '.($ocupacao/$total*100).'%<br/><br/>';
        echo 'Votos Totais: '.($total)."<br/><br/></h4>";
        echo "Ponderações:".$allComents;
        
        
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
