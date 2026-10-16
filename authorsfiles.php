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

<title>Our Files</title>
<link rel="icon" href="img/logo.jpg">
<link rel="stylesheet" type="text/css" href="css/newbtn.css">
</head>
<body style="background-color:#ACAD94;">
<?php 
            if ($_SESSION['tipologia'] !='admin')
            {header ('Location:index.php');}
?>
            <?php 
            echo"<h2>File: </h2>";
            mostraFilesauthors();
            ?>
</body>
</html>