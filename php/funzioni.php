<?php 

function query($sql)
{
    global $connessione;
    return mysqli_query($connessione, $sql);
}


function conferma($risultato)
{
    global $connessione;
   
    if(!$risultato)
    {
        die('Richieste fallita'.mysqli_error($connesione));
    }
}

function singleFile($qry)
{

    $ricerca_file= query($qry);
    conferma ($ricerca_file);
    //while ($i<$max)      //ciclo che mostra la quantità di prodotti che il cliente vuole vedere (partendo da una base di 12 prodotti)
    //{
        while ($row=mysqli_fetch_assoc($ricerca_file))     //ciclo while per mostrare il singolo prodotto
        {
            $file = <<<STRINGA_PDT
            <div class="" style="text-align:center;">
            <h1>{$row['titoloFile']}</h1><br>
            <h4>{$row['Argomenti']}</h4>
            <br><br><br>
            </div>

       <div id="wrap" style="text-align:center;">
       <p>
       <a href="pdf/{$row['pdfname']}" class="btn-slide2">
       <span class="circle2"><i class="fa fa-download"></i></span>
       <span class="title2">Download</span>
       <span class="title-hover2">Click here</span>
       </a>
       </p> 
       
       <br><br>
       <embed type="application/pdf" src="pdf/{$row['pdfname']}" width="1350" height="800"><br></div>
STRINGA_PDT;
echo $file;
        }   
?>

<h2> 
Autori: </h2> <br>
<?php
        $queryautore="SELECT authors_files.id_files, filepdf.id,authors_files.id_autore1, filepdf.titoloFile, authors_files.id_autore2,
         authors_files.id_autore3,authors_files.id_autore4,authors_files.id_autore5,filepdf.idmateria, autori.idautore, autori.nome_autore 
        FROM filepdf INNER JOIN authors_files ON authors_files.id_files = filepdf.id INNER JOIN autori ON autori.idautore = authors_files.id_autore1 
        OR autori.idautore = authors_files.id_autore2 OR autori.idautore = authors_files.id_autore3 OR autori.idautore = authors_files.id_autore4 
        OR autori.idautore = authors_files.id_autore5 WHERE authors_files.id_files ={$_GET['file']}";
        $ricerca_file2= query($queryautore);
        conferma ($ricerca_file2);
        while ($row2=mysqli_fetch_assoc($ricerca_file2))     //ciclo while per mostrare il singolo prodotto
        {
            $file2 = <<<STRINGA_AUTORE
            <h3>
            <a href="authorsfiles.php?idautore={$row2['idautore']}" class="btn5"> {$row2['nome_autore']} </a>
            </h3>
STRINGA_AUTORE;
echo $file2;
        }
        ?> 
        <br><br>
        <?php 

}

function mostraMaterie()
{
    $sql="SELECT * FROM materia ORDER BY nome ASC";
    $values=mysqli_fetch_assoc($result);

    $ricerca_subjects = query($sql);
    conferma ($ricerca_subjects);

    while ($row=mysqli_fetch_assoc($ricerca_subjects))     //ciclo while per mostrare il singolo prodotto
    {
        $materie = <<<STRINGA_PDT
        
         
             <a href="files.php?idmateria={$row['idmateria']}"  class="btn5">
             {$row['nome']}
             </a>
             <br>
               
STRINGA_PDT;
echo $materie;        
    }
}


function mostraFiles()
{
    $sql="SELECT * FROM filepdf WHERE idmateria={$_GET['idmateria']} AND idcartella=2 ORDER BY titoloFile ASC";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_file = query($sql);
    /*$ricerca_delfile = query($qry);*/
    conferma ($ricerca_file);

    while ($info=mysqli_fetch_assoc($ricerca_file))
    { 
        $files = <<<STRINGA_FILE
        
        <a href="filepage.php?file={$info['id']}" class="btn5"> 
        {$info['titoloFile']}
        </a>
        <br><br>

STRINGA_FILE;
echo $files;

    }
}

function mostraArgomenti()
{
    echo"<h2>"; echo "ARGOMENTI: "; echo "</h2>";
    //query argomento
        $sql="SELECT * FROM argomenti WHERE idmateria={$_GET['idmateria']} ";
        $result=mysqli_query($connessione,$sql);
        $ricerca_file = query($sql);
        conferma ($ricerca_file);


        while ($argomento=mysqli_fetch_assoc($ricerca_file))
    { 
        if($argomento['sottoargomento']=="si")
        {
        $descrizione = <<<STRINGA_FILE
        <h5>{$argomento['argomento']}</h5>
STRINGA_FILE;
echo $descrizione;
        }
        else{
            $descrizione2 = <<<STRINGA_FILE
            <h3>{$argomento['argomento']}</h3>
    STRINGA_FILE;
    echo $descrizione2;
        }
    }  
}

function mostraCartelle()
{
    $sql="SELECT * FROM cartella WHERE idmateria={$_GET['idmateria']} ORDER BY nome ASC";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_cartelle= query($sql);
    conferma ($ricerca_cartelle);
    
    while ($cartella=mysqli_fetch_assoc($ricerca_cartelle))
    {

        $cartelle = <<<STRINGA_FILE
        
        <a href="dir.php?idcartella={$cartella['idcartella']}" class="btn5"> 
        Cartella - {$cartella['nome']}
        </a>
        <br><br>

STRINGA_FILE;
echo $cartelle;

    }
}

function mostraArgomentiCartella()
{
    $sql="SELECT * FROM filepdf WHERE idcartella={$_GET['idcartella']} ORDER BY id ASC";
    $result=mysqli_query($connessione,$sql);

    $ricerca_file = query($sql);
    conferma ($ricerca_file);
    
        while ($row=mysqli_fetch_assoc($ricerca_file))     //ciclo while per mostrare il singolo prodotto
        {
            $files = <<<STRINGA_FILE
        
        <a href="filepage.php?file={$row['id']}" class="btn5"> 
        {$row['titoloFile']}
        </a>
        <br><br>

STRINGA_FILE;
echo $files;
        }       
}


//funzione per la ricerca
function ricerca_argomento()
{
    if(isset($_POST['submit']))
    {
        $argomento2 = $_POST["argomento"];
        $sql = "SELECT * FROM filepdf WHERE Argomenti LIKE %$argomento2%'";
        $result = mysqli_query($connessione,$sql);

        $ricerca_argomento=query($sql);
        while($row=mysqli_fetch_assoc($ricerca_argomento))
        {
$argomenti = <<<STRINGA_ARGOMENTI
        
            <a href="filepage.php?file={$row['id']}" class="btn5"> 
            {$row['titoloFile']}
            &nbsp; &nbsp; &nbsp; - &nbsp; 
            {$row['autore']}
            </a>
            <br><br>    
    
STRINGA_ARGOMENTI;
echo $argomenti;
            }       
        }

}

function mostraAutori()
{
    $sql="SELECT * FROM autori ORDER BY nome_autore ASC";
    $values=mysqli_fetch_assoc($result);

    $ricerca_subjects = query($sql);
    conferma ($ricerca_subjects);

    while ($row=mysqli_fetch_assoc($ricerca_subjects))     //ciclo while per mostrare il singolo prodotto
    {
        $materie = <<<STRINGA_PDT
        
         
             <a href="authorsfiles.php?idautore={$row['idautore']}"  class="btn5">
             {$row['nome_autore']}
             </a>
                <br><br>
STRINGA_PDT;
echo $materie;        
    }      
}


function mostraFilesauthors()
{ 
     /*left join per collegare la tabella 'authors_files' (tabella di molti a molti tra autori e filepdf) 
    e confrontare i vari id, se in 'authors_files' è presente l'id_files 3 dimmi di che materia è */
    $sql="SELECT authors_files.id_files, filepdf.id,authors_files.id_autore1, filepdf.titoloFile, authors_files.id_autore2, authors_files.id_autore3,authors_files.id_autore4,authors_files.id_autore5,filepdf.idmateria, materia.idmateria, materia.nome
    FROM filepdf INNER JOIN authors_files ON authors_files.id_files = filepdf.id
    INNER JOIN materia ON materia.idmateria = filepdf.idmateria WHERE authors_files.id_autore1={$_GET['idautore']} OR authors_files.id_autore2={$_GET['idautore']} 
    OR authors_files.id_autore3={$_GET['idautore']} OR authors_files.id_autore4={$_GET['idautore']} OR authors_files.id_autore5={$_GET['idautore']}";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_file = query($sql);
    /*$ricerca_delfile = query($qry);*/
    conferma ($ricerca_file);

    while ($info=mysqli_fetch_assoc($ricerca_file))
    { 
        $files = <<<STRINGA_FILE
        
        <a href="filepage.php?file={$info['id']}" class="btn5"> 
        {$info['titoloFile']}
       
        &nbsp; &nbsp; &nbsp; - &nbsp; 
        {$info['nome']}
         </a>
        <br><br>

STRINGA_FILE;
echo $files;
    }
}

function changeFiles ()
{
    ?> 
    <form class="" method="post">
    <p>Autore n.1: <input type="text" name="autore1"/> </p><br>
    <p>Autore n.2: <input type="text" name="autore2"/> </p><br>
    <p>Autore n.3: <input type="text" name="autore3"/> </p><br>
    <p>Autore n.4: <input type="text" name="autore4"/> </p><br>
    <p>Autore n.5: <input type="text" name="autore5"/> </p><br>

    <?php 

    $autore1 = $_POST["autore1"];
    $autore2 = $_POST["autore2"];
    $autore3 = $_POST["autore3"];
    $autore4 = $_POST["autore4"];
    $autore5 = $_POST["autore5"];

    $sql="SELECT * FROM autori ";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_file = query($sql);
    /*$ricerca_delfile = query($qry);*/
    conferma ($ricerca_file);

    while ($ricerca_autori=mysqli_fetch_assoc($ricerca_file))
    {
        if($autore1 == $ricerca_autori['nome_autore'] )
        {
            $idautore1 = $ricerca_autori['idautore'];
        }
        if($autore2 == $ricerca_autori['nome_autore'] )
        {
            $idautore2 = $ricerca_autori['idautore'];
        }
    
        if($autore3 == $ricerca_autori['nome_autore'] )
        {
            $idautore3 = $ricerca_autori['idautore'];
        }
    
        if($autore4 == $ricerca_autori['nome_autore'] )
        {
            $idautore4 = $ricerca_autori['idautore'];
        }
    
        if($autore5 == $ricerca_autori['nome_autore'] )
        {
            $idautore5 = $ricerca_autori['idautore'];
        }
    }
    $idfile=$_SESSION['fileid'];

    ?>

    <input id="upload" type="submit" name="submit" value="Invia" required ><br><br><br>

    <?php
    if(isset($_POST['submit']))
    {
        $sqlcreate ="INSERT INTO authors_files(id_autore1, idautore2, idautore3, idautore4, idautore5, id_files)
                    VALUES('$idautore1','$idautore2','$idautore3','$idautore4','$idautore5','$idfile')";
                    $query2 = mysqli_query($connessione,$sqlcreate);
                //}
      
        header('Location: ../filepage.php');
    }?>
    </form>
    <?php
}


function mostraQuestionari()
{
    $sql="SELECT * FROM questionari WHERE id_materia={$_GET['idmateria']}";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_cartelle= query($sql);
    conferma ($ricerca_cartelle);
    while ($quest=mysqli_fetch_assoc($ricerca_cartelle))
    {
       
        $cartelle = <<<STRINGA_FILE
        
        <a href="{$quest['url']}" class="btn5"> 
        Questionario - {$quest['titolo_quest']}
        </a>
        <br><br>

STRINGA_FILE;
echo $cartelle;

    }
}

//funzione per aprire l'argomento random
function apriargomentorandom()
{
    $sql="SELECT * FROM materia WHERE idmateria={$_GET['idmateria']} AND Argomenti='1'";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_ar= query($sql);
    conferma ($ricerca_ar);
    while ($quest=mysqli_fetch_assoc($ricerca_ar))
    {
        $argomento= <<<STRINGA_ARGOMENTO
        
        <a href="argomenti.php?materia={$_GET['idmateria']}" class="button-54" role="button">TUTTI GLI ARGOMENTI </a>
        <br><br><br>
        <a href="argomenti_random.php?materia={$_GET['idmateria']}"  class="button-54" role="button">ARGOMENTI RANDOM </a>
        <BR><BR> <BR><BR>
STRINGA_ARGOMENTO;
echo $argomento;

    }

     
}

//Tutti gli argomenti per ripassare
function Tutti_gli_argomenti()
{
    $sql="SELECT * FROM argomenti_random WHERE id_materia={$_GET['materia']} ORDER BY numero_argomento ASC";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_ar= query($sql);
    conferma ($ricerca_ar);
    while ($quest=mysqli_fetch_assoc($ricerca_ar))
    {
        $argomento= <<<STRINGA_ARGOMENTO
    <a href="argomento_singolo.php?idargomento={$quest['id']}" class="button-6" role="button">
    {$quest['titolo_argomento']}
    </a>
    <br><br>
STRINGA_ARGOMENTO;
echo $argomento;
    
    }
}

function mostra_argomento()
{
    $sql="SELECT * FROM argomenti_random WHERE id={$_GET['idargomento']}";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_ar= query($sql);
    conferma ($ricerca_ar);
    while ($quest=mysqli_fetch_assoc($ricerca_ar))
    {
        $numero_foto = $quest['nfoto'];

        $argomento= <<<STRINGA_FILE
        <h3> <u> {$quest['titolo_argomento']}</h3> </u>
         <br><br>
         <h4>{$quest['descrizione']}</h4>
         <br><br>
STRINGA_FILE;
echo $argomento;

         if($numero_foto>=1 and $numero_foto<=10)
{
$argomento2= <<<STRINGA_FILE2
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto']}" alt="foto">
         <br>
STRINGA_FILE2;
echo $argomento2;
}

if($numero_foto >= 2 and $numero_foto<=10)
{ 
$argomento3= <<<STRINGA_FILE3
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 2']}" alt="foto">
         <br><br>
STRINGA_FILE3;
echo $argomento3;
}

if($numero_foto >= 3 and $numero_foto<=10)
{ 
$argomento4= <<<STRINGA_FILE4
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 3']}" alt="foto">
         <br><br>
STRINGA_FILE4;
echo $argomento4;
}

if($numero_foto >= 4 and $numero_foto<=10)
{ 
$argomento5= <<<STRINGA_FILE5
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 4']}" alt="foto">
         <br><br>
STRINGA_FILE5;
echo $argomento5;
}

if($numero_foto >= 5 and $numero_foto<=10)
{ 
$argomento6= <<<STRINGA_FILE6
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 5']}" alt="foto">
         <br><br>
STRINGA_FILE6;
echo $argomento6;
}

if($numero_foto >= 6 and $numero_foto<=10)
{ 
$argomento7= <<<STRINGA_FILE7
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 6']}" alt="foto">
         <br><br>
STRINGA_FILE7;
echo $argomento7;
}

if($numero_foto >= 7 and $numero_foto<=10)
{ 
$argomento8= <<<STRINGA_FILE8
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 7']}" alt="foto">
         <br><br>
STRINGA_FILE8;
echo $argomento8;
}

if($numero_foto >= 8 and $numero_foto<=10)
{ 
$argomento9= <<<STRINGA_FILE9
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 8']}" alt="foto">
         <br><br>
STRINGA_FILE9;
echo $argomento9;
}

if($numero_foto >= 9 and $numero_foto<=10)
{ 
$argomento10= <<<STRINGA_FILE10
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 9']}" alt="foto">
         <br><br>
STRINGA_FILE10;
echo $argomento10;
}

if($numero_foto==10)
{ 
$argomento11= <<<STRINGA_FILE11
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 10']}" alt="foto">
         <br><br>
STRINGA_FILE11;
echo $argomento11;
}

    }

}

//Argomenti random per ripassare
function argomentoRandom()
{
    ?>  <form class="" method="post" enctype="multipart/form-data">
        <br><br>
        <div class="" style="text-align:center;">
        <input id="random" type="submit" name="submit" value="Argomento random" required ><br><br><br>
</div>
        <?php
    $result=query("SELECT COUNT(*) AS total from argomenti_random WHERE id_materia = {$_GET['materia']}");
    $data=mysqli_fetch_assoc($result);
    $prova= $data['total'];
   
    $numero = rand(0,$prova);
    if($numero == 0)
    {$numero = $numero + 1;}
    if(isset($_POST['submit']))
    {
        $result2=query("SELECT * FROM argomenti_random WHERE numero_argomento = {$numero} AND id_materia={$_GET['materia']}");
        while ($quest=mysqli_fetch_assoc($result2))
        {
        
            $numero_foto = $quest['nfoto'];
        $argomento= <<<STRINGA_FILE
        <h3> <u> {$quest['titolo_argomento']}</h3> </u>
         <br><br>
         <h4>{$quest['descrizione']}</h4>
         <br><br>
STRINGA_FILE;
echo $argomento;
if($numero_foto>=1 and $numero_foto<=10)
{
$argomento2= <<<STRINGA_FILE2
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto']}" alt="foto">
         <br>
STRINGA_FILE2;
echo $argomento2;
}

if($numero_foto >= 2 and $numero_foto<=10)
{ 
$argomento3= <<<STRINGA_FILE3
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 2']}" alt="foto">
         <br><br>
STRINGA_FILE3;
echo $argomento3;
}

if($numero_foto >= 3 and $numero_foto<=10)
{ 
$argomento4= <<<STRINGA_FILE4
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 3']}" alt="foto">
         <br><br>
STRINGA_FILE4;
echo $argomento4;
}

if($numero_foto >= 4 and $numero_foto<=10)
{ 
$argomento5= <<<STRINGA_FILE5
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 4']}" alt="foto">
         <br><br>
STRINGA_FILE5;
echo $argomento5;
}

if($numero_foto >= 5 and $numero_foto<=10)
{ 
$argomento6= <<<STRINGA_FILE6
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 5']}" alt="foto">
         <br><br>
STRINGA_FILE6;
echo $argomento6;
}

if($numero_foto >= 6 and $numero_foto<=10)
{ 
$argomento7= <<<STRINGA_FILE7
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 6']}" alt="foto">
         <br><br>
STRINGA_FILE7;
echo $argomento7;
}

if($numero_foto >= 7 and $numero_foto<=10)
{ 
$argomento8= <<<STRINGA_FILE8
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 7']}" alt="foto">
         <br><br>
STRINGA_FILE8;
echo $argomento8;
}

if($numero_foto >= 8 and $numero_foto<=10)
{ 
$argomento9= <<<STRINGA_FILE9
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 8']}" alt="foto">
         <br><br>
STRINGA_FILE9;
echo $argomento9;
}

if($numero_foto >= 9 and $numero_foto<=10)
{ 
$argomento10= <<<STRINGA_FILE10
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 9']}" alt="foto">
         <br><br>
STRINGA_FILE10;
echo $argomento10;
}

if($numero_foto==10)
{ 
$argomento11= <<<STRINGA_FILE11
        <div class="" style="text-align:center;">
         <img src="../immagini_argomenti/{$quest['foto 10']}" alt="foto">
         <br><br>
STRINGA_FILE11;
echo $argomento11;
}

        }
    }
?> 
</form>
<?php 
   
}


//Funzioni per l'area personale-------------------------------------------------------------------------------------------------------------------------------------

function myArea()
{
        $utenteid=$_SESSION['idutente'];
        $sql="SELECT * FROM utentiourf99 WHERE id={$utenteid}";
        $result=mysqli_query($connessione,$sql);
        $ricerca_file = query($sql);
        conferma ($ricerca_file);

        if(isset($_POST['prova1']))
        {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $username = $_POST["username"];
            $password = $_POST["password"]; 
            $matricola = $_POST["matricola"];
            $email = $_POST["email"];

            $sql = "UPDATE utentiourf99 SET nome='$nome', cognome='$cognome', username='$username', pass= '$password', matricola='$matricola', email='$email' WHERE id={$utenteid}";
            $query = mysqli_query($connessione,$sql);
            //echo "Sto caricando";
            header('Location: ../settings.php');
        }

        while ($account=mysqli_fetch_assoc($ricerca_file))
        { 

    $acc = <<<STRINGA_AREA
    <form method="POST">
<div class="container rounded bg-white mt-5 mb-5">
<div class="row">
<div class="col-md-3 border-right">
    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></span><span class="text-black-50"></span><span> </span></div>
</div>
<div class="col-md-5 border-right">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Aggiungi account</h4>
        </div>
        <div class="row mt-2">
            <div class="col-md-6"><label class="labels">Nome</label><input type="text" name="nome" class="form-control" placeholder="Nome" value="{$account['nome']}"></div>
            <div class="col-md-6"><label class="labels">Cognome</label><input type="text" name="cognome" class="form-control" value="{$account['cognome']}" placeholder="Cognome"></div>
        </div>
        <div class="row mt-3">
        <div class="col-md-12"><label class="labels">Matricola</label><input type="text" name="matricola" class="form-control" placeholder="Inserisci matricola" value="{$account['matricola']}"></div>
            <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" class="form-control" placeholder="Inserisci l' email" value="{$account['email']}"></div>
            <div class="col-md-12"><label class="labels">Username</label><input type="text" name="username" class="form-control" placeholder="Inserisci l'username username" value="{$account['username']}"></div>
            <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control" placeholder="Inserisci la password" value="{$account['pass']}"></div>
        </div><br>
        <input id="upload" type="submit" name="prova1" value="Salva" required >
    </div>
</div>
</div>
</div>

STRINGA_AREA;
echo $acc;
        }

        
} 

function addAccount()
{
    ?> <form method="POST" >
    <p>Username: <input type="text" name="usernameutente" /> </p><br>
    <p>Password: <input type="text" name="passwordutente" /> </p><br>
    <p>Tipologia utente: <input type="text" name="tipologiautente" /> 'Admin' o 'Normale'<br><br><br></p> 
    <input id="uploadutente" type="submit" name="prova2" value="Aggiungi account" required ><br>
    <?php
 if(isset($_POST['prova2']))
 {
     $usernameutente= $_POST["usernameutente"];
     $passwordutente = $_POST["passwordutente"];
     $tipologiautente = $_POST["tipologiautente"];

     $sqladd = "INSERT INTO utentiourf99(username,pass,tipologia) VALUES ('$usernameutente','$passwordutente','$tipologiautente')";
     $query = mysqli_query($connessione,$sqladd);
     header('Location: ../settings.php');
 }
}


?> 

