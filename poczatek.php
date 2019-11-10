<?php
    session_start();
    $_SESSION['blad']=0;
    $_SESSION['success']=false;
    for ($i=0; $i<35; $i++){
        $_SESSION['l'.$i]='litera_akt';
    }
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf8">
    <title>Szubienica</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script rel="javascript" src="jquery321.js"></script>
    <script rel="javascript" src="klawiaturanieakt.js" type="text/javascript"></script>
    <script rel="javascript" src="kategorie_poczatek.js" type="text/javascript"></script>
</head>

<body>
<input type="hidden" id="spis_kategorii" value='<?php echo $_SESSION['json_kat'] ?>'>
<div class="container">
<header>HASŁO DO ODGADNIĘCIA</header>
<div class="haslo">--kie- t-m ha-ło</div>
<div class="kategoria">
    <header>Wybierz kategorię:</header>
<ol></ol>
</div>
<div class="obraz"><img src="img/ojej.png"></div>
<div class="klawiatura"></div>
</div>

</body>
</html>