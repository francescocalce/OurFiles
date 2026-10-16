<?php session_start();?>
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

<style media="screen">
        
div{
    border: 2px solid black;
    width: 500px;
    margin-left:30%;
    margin-top: 5%;
}

label{
    font-size: 20px;
    font-weight: bold;
}

#argomenti{
    height: 60px;
    width: 230px;
}

select{
    font-size: 20px;
}

#pdf{
    font-size: 20px;
    font-weight: bold;
    margin-top: 10px;
}

#upload{
    font-size: 20px;
    font-weight: bold;
    background-color: #857C8D;
}
    </style>

<link rel="icon" href="img/logo.jpg">
</head>
<body style="background-color:#ACAD94;">
    <?php 
           if ($_SESSION['tipologia'] !='admin')
           {header ('Location:index.php');}
    ?>
<div class="" style="text-align:center;">
    <form class="" action ="upload.php" method="post" enctype="multipart/form-data">
    
    <p>Nome file: <input type="text" name="titolo" /> </p>
    
<!-- Scegli il pdf-->
    <input id="pdf" type="file" name="pdf" value="" required><br>

    <!--Scegli la materia-->
        <?php
        
        include("php/config.php");

        $sql2="SELECT * FROM materia";
        $result=mysqli_query($connessione,$sql2);
        conferma ($result);
        ?>
        <br>
        <select name="materia">
        
        <?php
        //Elenco materie
            while($row = mysqli_fetch_assoc($result)) {
            echo('
            <option value="'); echo $row["idmateria"]; echo('">'); echo $row["nome"]; echo('</option>');
            $materia = $_POST['materia'];
             }
        ?>

    </select>

    <br><br>
    <!-- Scegli la cartella-->
    <label>Scegli la cartella lavoro(non obbligatoria)</label>
        <?php
        
        include("php/config.php");

        $sql3="SELECT * FROM cartella";
        $result2=mysqli_query($connessione,$sql3);
        conferma ($result2);
        ?>
        <br>
        <select name="cartella">
        
        <?php
        //Elenco materie
            while($row = mysqli_fetch_assoc($result2)) {
            echo('
            <option value="'); echo $row["idcartella"]; echo('">'); echo $row["nome"]; echo('</option>');
            $cartella = $_POST['cartella'];
             }
        ?>

    </select>
    <br><br>Argomenti presenti in questo file: <br><textarea type="text" name="argomenti" id="argomenti"></textarea>


<?php
        if(isset($_POST['submit']))
        {
            
            $pdf=$_FILES['pdf']['name']; 
            $pdf_type = $_FILES['pdf']['type'];
            $pdf_size = $_FILES['pdf']['size'];
            $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
            $pdf_store="pdf/".$pdf;


            $titolo = $_POST["titolo"];
            $argomenti = $_POST["argomenti"];
            move_uploaded_file($pdf_tem_loc,$pdf_store);

            $sql = "INSERT INTO filepdf(pdfname,titoloFile,idmateria,idcartella,Argomenti) VALUES ('$pdf','$titolo','$materia','$cartella','$argomenti')";
            $query = mysqli_query($connessione,$sql);

            
            //echo "Sto caricando";
            header('Location: ../paginautente.php');
        }
?>
 <br><br><br>
 <input id="upload" type="submit" name="submit" value="Upload" required ><br><br><br>


    </form>

</body>
</html>