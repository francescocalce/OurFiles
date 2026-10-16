<?php session_start();
//CONFIGURAZIONE DEL DATABASE
 include("php/config.php");
 include("php/funzioni_elett.php");?>


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

<?php
  $prova= <<<STRINGA_PROVA
<a href="files.php?idmateria={$_GET['materia']}" class="bn16"> <-TORNA INDIETRO! </a> 
STRINGA_PROVA;
echo $prova
?>

                <!-- Mostra file  -->
                <?php if ($_GET['materia'] ==3)		//se la materia è elettrotecnica allora prendi un'altra funzione
                {argomentoRandom_elett();}
                else{argomentoRandom();} ?>

</body>
</html>
                