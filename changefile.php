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


<?php echo $_SESSION['fileid'];?>

<?php
changeFiles();

        //query per controllare se il file è presente o meno in 'authors_files'
        /* $query="SELECT * FROM authors_files";
        $result2=mysqli_query($connessione,$query);
        $values2=mysqli_fetch_assoc($result2); 

        $ricerca_file2 = query($query);
        //$ricerca_delfile = query($qry);//
        conferma ($ricerca_file2);

        while ($info2=mysqli_fetch_assoc($ricerca_file2))
        {
            if($idfile == $info2['id_files']) 
            {
                $_SESSION['verifica']=TRUE;
                break;
            }
            else{$_SESSION['verifica']=FALSE;}
        } 

        //se la $_SESSION['verifica']=TRUE significa che il file è già presente nek database e non deve essere inserito ma bensì aggiornato
           /* if($_SESSION['verifica']==TRUE) 
            {
                $sqlupdate="UPDATE authors_files
                SET id_autore1 = '$autore1' ,id_autore2 = '$autore2',id_autore3 = '$autore3',id_autore4 = '$autore4',id_autore5 = '$autore'
                WHERE id_files = '$idfile'";
                $queryupdate = mysqli_query($connessione,$sqlupdate);
            }
            else {
                    $sqlcreate ="INSERT INTO authors_files(id_autore1, idautore2, idautore3, idautore4, idautore5, id_files)
                    VALUES('$idautore1','$idautore2','$idautore3','$idautore4','$idautore5','$idfile')";
                    $query2 = mysqli_query($connessione,$sqlcreate);
                //}*/
  ?>
