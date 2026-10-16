<?php session_start();
//CONFIGURAZIONE DEL DATABASE
 include("php/config.php");?>

<!DOCTYPE html>

<!-- style per l'adattamento in base al dispositivo -->
<style>       
@viewport {
	zoom: 1.0;
	width: extend-to-zoom;
}

@-ms-viewport{
	width: extend-to-zoom;
	zoom: 1.0;
}
</style>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">        <!-- serve per l'adattamento del sito ad ogni dispositivo -->
<link rel="icon" href="img/logo.jpg">
    <title>Our Files</title>

    <style media="screen">

form{
        margin-left: 12%;
}

    </style>
    <link rel="stylesheet" type="text/css" href="css/newbtn.css">

</head>
<body style="background-color:#ACAD94;">



                <!-- Mostra file  -->
            <?php 
                
                if ($_SESSION['tipologia'] =='admin')
                {
                    ?>
                    <!-- <a href="changefile.php"  class="bn15">Modifica file</a> -->
                    <?php
                    $_SESSION['fileid']=$_GET['file'];
                    singleFile("SELECT * FROM filepdf WHERE id={$_GET['file']}"); 
                }
                else {
                    header ('Location:index.php');
                }
            ?>

</body>
</html>
                