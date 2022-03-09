<?php

error_reporting(E_ERROR | E_PARSE);

session_start();
define('HOST', '186.202.152.92');
define('USUARIO', 'dceunicir');
define('SENHA', 'leandroLEVY01@');
define('DB', 'dceunicir');
$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

$total = 945;

if($_SESSION['contador'] <= $total){

    $sql = "SELECT * FROM alunos WHERE ID = ".$_SESSION['contador']."";
    $query_aluno = mysqli_query($conn, $sql);

    while($aluno = mysqli_fetch_assoc($query_aluno)){

    ?>
    
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo$aluno['NOME'] ?></title>
            <script>
                window.onload = ()=>{
                    var nomeEscola = "<?php echo$aluno['ESCOLA']  ?>";
                    var nomeCidadeEstado = "<?php echo$aluno['CIDADE']   ?>";
                    var nomeDiretor = "<?php echo$aluno['DIRETOR']   ?>";
                    var nomeGestor = "<?php echo$aluno['GERENCIA']   ?>";
                    var nomeAluno = "<?php echo$aluno['NOME']   ?>";
                    var nomeDia = "<?php echo(rand(7, 9))   ?>";

                    document.getElementById('nomeEscola1').innerHTML = nomeEscola;
                    document.getElementById('nomeAluno').innerHTML = nomeAluno;
                    document.getElementById('nomeEscola3').innerHTML = nomeEscola;
                    document.getElementById('nomeCidadeEstado').innerHTML = nomeCidadeEstado;
                    document.getElementById('nomeDiretor').innerHTML = nomeDiretor;
                    document.getElementById('nomeGestor').innerHTML = nomeGestor;
                    document.getElementById('nomeDia').innerHTML = nomeDia;
                }
            </script>
            <style>
                .Grupo1{text-align: center;}
                .Grupo2{text-align: center;}
                .Grupo3{text-align: center;}
                .Grupo4{text-align: right;}
                .Grupo5{text-align: center; display: flex; flex-direction: column;}
        
                @media print {
                    .noPrint{display: none;}
                }
            </style>
        </head>
        <body style="height: 100vh; display: flex; justify-content: space-around; flex-direction: column;">
            <div class="Grupo1">
                <p>SECRETARIA DE ESTADO DA EDUCAÇÃO E DA CIÊNCIA E TECNOLOGIA</p>
                <p><span id="nomeGestor"></span>ª GERÊNCIA REGIONAL DE EDUCAÇÃO</p>
                <span id="nomeEscola1"></span>
            </div>
            <div class="Grupo2">
                <p>DECLARAÇÃO DE VÍNCULO ESCOLAR</p>
            </div>
            <div class="Grupo3">
                <p>Declaramos para os devidos fins que se fizerem necessários, que <span id="nomeAluno"></span>, é estudante regularmente matriculado na Rede Estadual de Ensino, na escola <span id="nomeEscola3"></span>, para o ano letivo de 2022. </p>
            </div>
            <div class="Grupo4">
                <p><span id="nomeCidadeEstado"></span>-PB, 0<span id="nomeDia"></p><p> de março de 2022</p>
            </div>
            <div class="Grupo5">
                <p>Direção<br> <span id="nomeDiretor"></span></p>
                
            </div>

        <div>

        <button><a href="index.php?p=p">Proxima </a></button>
        

        <button><a href="index.php?a=a">Anterior </a></button>
        
        </div>

        </body>
        </html>

    <?php

    }


if($_GET){

    if($_GET['p']=='p'){
        
        $_SESSION['contador']+=1;
    }elseif($_GET['a']=='a'){

        $_SESSION['contador']-=1;        
    }

}

}else{

echo("ACABARAM OS ALUNOS");

}

