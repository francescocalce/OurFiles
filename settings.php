<?php 
    session_start();
    $current_page = $_SERVER['REQUEST_URI'];
    include("php/config.php");
?>
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

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">        <!-- serve per l'adattamento del sito ad ogni dispositivo -->
    <title>Our files</title>
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="icon" href="img/logo.jpg">
        
    </head>
<body >
    <div class="main-body">
        <div class="navbar" style="display: block;">
            <a href="settings.php?id=1"><button class="setting-button">Aggiungi Account</button></a>
            <a href="settings.php?id=2"><button class="setting-button">Materia</button></a>
            <a href="settings.php?id=3"><button class="setting-button" >Argomenti</button></a>
            <a href="settings.php?id=4"> <button class="setting-button">My account</button></a>

        </div>
        <div class="setting-page">
          <?php
          
            if($current_page == "/settings.php")
            {
                myArea();
            }
            if($current_page == "/settings.php?id=1")
            {
                addAccount();
            }
            if($current_page == "/settings.php?id=2")
            {
                
            }
            if($current_page == "/settings.php?id=3")
            {
                
            }
            if($current_page == "/settings.php?id=4")
            {
                myArea();
            }
          ?>
        </div>
    </div>

</body>
</html>