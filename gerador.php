<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

define('HOST', '186.202.152.92');
define('USUARIO', 'dceunicir');
define('SENHA', 'leandroLEVY01@');
define('DB', 'dceunicir');
$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

$total = 945;


if($_POST){

$_SESSION['contador'] = $_POST['numero'];  
    
}



if($_SESSION['contador'] <= $total){

    $sql = "SELECT * FROM listacsv WHERE ID = ".$_SESSION['contador']."";
    $query_aluno = mysqli_query($conn, $sql);

    while($aluno = mysqli_fetch_assoc($query_aluno)){

        
        var_dump($aluno);






    ?>

        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
        <?php

            var_dump($aluno);

        ?>
        </body>
        </html>

    
        <!--DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
            <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
            <title><?php echo("N:".$aluno['ID']."-".$aluno['NOME']."") ?></title>
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
                @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
                * {
                    font-family: 'Lato', sans-serif;
                    font-weight: 700;

                    margin-top: 0;
                    margin-bottom: 2.5px;
                }

                .Grupo1{text-align: center;}
                .Grupo2{text-align: center; margin-top: 110px}
                .Grupo3{text-align: center; margin-top: 110px}
                .Grupo4{text-align: right; margin-top: 110px}
                .Grupo5{text-align: center; display: flex; flex-direction: column; margin-top: 110px}
                .Grupo6{height: 100%; background-color: white;}
                
                @media print {
                    .noPrint{display: none;}
                }
            </style>
            <script>
   
            function getPDF(){
                $("#downloadbtn").hide();
                $("#genmsg").show();
                var HTML_Width =  690;
                var HTML_Height = 930;
                var top_left_margin = 35;
                var PDF_Width = HTML_Width+(top_left_margin*3.25);
                var PDF_Height = (top_left_margin*1)+(PDF_Width*1.35)+(top_left_margin*1);
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;
                
                var totalPDFPages = 0;
                

                html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
                    canvas.getContext('2d');
                    
                    console.log(canvas.height+"  "+canvas.width);
                    
                    
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
                    
                    
                    for (var i = 1; i <= totalPDFPages; i++) { 
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                    }
                    
                    pdf.save("DECLARAÇÃO DE <?php echo$aluno['NOME']?>");
                    
                    setTimeout(function(){ 			
                        $("#downloadbtn").show();
                        $("#genmsg").hide();
                    }, 0);

                });
            };

            </script>
        </head>
        <body style="display: flex;flex-direction: column;align-items: center;">

            <div>
                <form action="" method="post">
                    <label for="numero">Digite o numero da declaração:</label>
                    <input name="numero" type="number" placeholder="numero aqui">
                    <button type='submit'>Só vai mano</button>
                </form>
            </div>

            <div>
        
        <button><a href="gerador.php?a=a">Anterior </a></button>
        <button><a href="gerador.php?p=p">Proxima </a></button>
        
        <button onclick="getPDF()" id="downloadbtn">Download PDF</button>
        
        </div>


            <div style="width: 690px; height: 920px; display: flex; flex-direction: column; padding-left: 40px" class="canvas_div_pdf">
                <div class="Grupo1">
                    <img src="./imgParaiba.png" width="350px" height="auto" alt="header">
                    <p>SECRETARIA DE ESTADO DA EDUCAÇÃO E DA CIÊNCIA E TECNOLOGIA</p>
                    <p><span id="nomeGestor"></span>ª GERÊNCIA REGIONAL DE EDUCAÇÃO</p>
                    <span  id="nomeEscola1"></span>
                </div>
                <div class="Grupo2">
                    <p>DECLARAÇÃO DE VÍNCULO ESCOLAR</p>
                </div>
                <div class="Grupo3">
                    <p>Declaramos para os devidos fins que se fizerem necessários, que <span  id="nomeAluno"></span>, é estudante regularmente matriculado na Rede Estadual de Ensino, na escola <span  id="nomeEscola3"></span>, para o ano letivo de 2022. </p>
                </div>
                <div class="Grupo4">
                    <p><span  id="nomeCidadeEstado"></span><span >-PB</span>, 0<span id="nomeDia"></span> de março de 2022</p>
                </div>
                <div class="Grupo5">
                    <p> <span  id="nomeDiretor"></span><br> Gestor escolar</p>
                    
                </div>
                <div class="Grupo6" style="margin-bottom: 0">
                </div>
            </div>

        

        </body>
        </html-->

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

