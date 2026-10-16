<?php

function Tutti_gli_argomenti_elett()
{
    $_SESSION['circuiti']=false;
    $_SESSION['campi']=false;
    $sql="SELECT * FROM argomenti_random WHERE id_materia={$_GET['materia']} ORDER BY numero_argomento ASC";
    $result=mysqli_query($connessione,$sql);
    $values=mysqli_fetch_assoc($result); 

    $ricerca_ar= query($sql);
    conferma ($ricerca_ar);
    while ($quest=mysqli_fetch_assoc($ricerca_ar))
    { 
        if ($quest['numero_argomento']<=62 and $_SESSION['circuiti']==false and $_GET['materia']==3 )
        {
            ?> <h1> Circuiti: </h1> <?php
            $_SESSION['circuiti']=true;
        }
        $argomento= <<<STRINGA_ARGOMENTO
    <a href="argomento_singolo.php?idargomento={$quest['id']}" class="button-6" role="button">
    {$quest['titolo_argomento']}
    </a>
    <br><br>
STRINGA_ARGOMENTO;
echo $argomento;
        if ($quest['numero_argomento']>=62 and $_SESSION['campi']==false and $_GET['materia']==3 )
        {
            ?> <h1> Campi: </h1> <?php
            $_SESSION['campi']=true;
        }
    }
}


function argomentoRandom_elett()
{
    ?>  <form class="" method="post" enctype="multipart/form-data">
        <br><br>
        <div class="" style="text-align:center;">
            <input id="random" type="submit" name="submit_circ" value="Argomento random circuiti" required ><br><br>
            <input id="random" type="submit" name="submit_campi" value="Argomento random campi" required ><br><br><br>
       
</div>
        <?php
    $result=query("SELECT COUNT(*) AS total from argomenti_random WHERE id_materia = {$_GET['materia']}");
    $data=mysqli_fetch_assoc($result);
    $prova= $data['total'];
    
   
    $numero_circ = rand(0,62);           //62 = ultimo argomento di circuiti
    $numero_campi = rand(63,$prova);           //va da 63 al numero massimo di argomenti

    if($numero_circ == 0)
    {$numero_circ = $numero_circ + 1;}

    if(isset($_POST['submit_circ']))          //se preme il tasto dell'argomento random di circuiti
    {
        $result2=query("SELECT * FROM argomenti_random WHERE numero_argomento = {$numero_circ} AND id_materia={$_GET['materia']}");
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
else {
    if(isset($_POST['submit_campi']))          //se preme il tasto dell'argomento random di circuiti
    {
$result3=query("SELECT * FROM argomenti_random WHERE numero_argomento = {$numero_campi} AND id_materia={$_GET['materia']}");
        while ($quest=mysqli_fetch_assoc($result3))
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
}


