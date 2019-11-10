<?php
    session_start();
    require_once "connect.php";
    $polaczenie = new mysqli($hostname, $username, $user_password, $db_name);
    $polaczenie->query("set charset utf8");
    $polaczenie->query("set names 'utf8' collate 'utf8_polish_ci'");
    $sql_kategorie=("select *, lower(kategoria) as kategoria from kategoria");
    $zestaw_kategorii = $polaczenie->query($sql_kategorie);
    $liczba_kategorii = $zestaw_kategorii->num_rows;
    
    while ($wiersz=$zestaw_kategorii->fetch_assoc())
       $tab[]=$wiersz['kategoria'];

    class Kategorie {

    }

    $kategorie = new Kategorie();
    for ($i=0; $i<$liczba_kategorii; $i++){
        $j=$i+1;
        $kategorie->$j = $tab[$i];
    }
    $json_kategorie = json_encode($kategorie);
   $_SESSION['json_kat']=$json_kategorie;
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf8">
    <title>Szubienica</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script rel="javascript" src="jquery321.js"></script>
    <script rel="javascript" src="kategorie_start.js"></script>
</head>

<body>
<input type="hidden" id="spis_kategorii" value='<?php echo $json_kategorie ?>'>
<div class="container">
    <header>SZUBIENICA bez szubienicy,<br> czyli odgadnij hasło !</header>
    <div class="wyroznienie">(test wiedzy dla prawdziwych twardzieli)</div>
    
   
    <div class="okladka">
    <header>Kategorie do wyboru to:</header>
    <ol></ol>
    </div>
    <div class="image"><img src="img/mysle.png"></div>

    <div class="okladka">
    <header>Zasady gry</header><br>
    Zapraszam do zagrania w znaną grę w wersji komputerowej. Jeśli masz tyle lat co ja, z całą pewnością znasz zasady. Dla znacznie młodszych krótkie wyjaśnienie:<br>
    <ol>
        <li>Wybierasz jedną z proponowanych kategorii hasła</li>
        <li>W miejsce kresek wpisujesz - przy pomocy wyświetlonej klawiatury - litery</li>
        <li>Wygrasz jeśli odgadniesz hasło przy - co najwyżej - 10. nieodgadniętych literach</li>
    </ol>

    Miłej zabawy !
    </div>
    <div class="okladka_bottom">Gotowe ? ...  &nbsp;&nbsp; <a href="/szubienica/poczatek.php">    No to podejmij wyzwanie :-)</a>
    </div>
</div>


</body>
</html>