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

<title>Our files</title>

<link rel="stylesheet" type="text/css" href="css/newbtn.css">

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">

  <link rel="icon" href="img/logo.jpg">
</head>
<body style="background-color:#ACAD94;">
<?php 
            if ($_SESSION['tipologia'] !='admin')
            {header ('Location:index.php');}
?>
     
        <h1>Autori:</h1>
        <div class="div1">
            <?php 
                mostraAutori();
            ?>

            <br><br><br>

        
</body>
</html>