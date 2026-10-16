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
    <style media="screen">
        
div{
    border: 2px solid black;
    width: 500px;
    margin-left:3%;
    margin-top: 3%;
}

form{
        margin-left: 15%;
        margin-top: 5%;
}
#view{
    font-size: 20px;
    font-weight: bold;
}
#upload{
    font-size: 20px;
    font-weight: bold;
}

</style>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body style="background-color:#ACAD94;">

<font color="black">
<h1>Ciao <?php echo $_SESSION['utente']; ?></h1>
</font>

<?php 
            if ($_SESSION['tipologia'] !='admin')
            {header ('Location:index.php');}
?>            
<div class="" style="text-align:center;">
<br><br>

    <a href="https://www.ourfiles.altervista.org/upload.php">
    <button id="upload" class="fa fa-cloud-upload fa-lg">  Carica appunti</button></a>
    <br><br><br>
    <a href="https://www.ourfiles.altervista.org/subjects.php">
    <button id="view" class="fa fa-file-text fa-lg">  Visualizza appunti</button></a>
    <br><br><br>
   <a href="https://www.ourfiles.altervista.org/authors.php">
    <button id="view" class="fa fa-pencil fa-lg">  Autori</button></a>
    <br><br><br>
     <!--<a href="https://www.ourfiles.altervista.org/search.php">
    <button id="view" class="fa fa-search fa-lg">  Cerca</button></a>
    <br><br><br>-->
</div>
<br><br><br><br><br>
<br> <img src="img/orario.jfif">
<!--<a href="https://www.ourfiles.altervista.org/myarea.php">
    <button id="view" class="fa fa-address-book fa-lg">  Area privata</button></a>-->

</body>
</html>