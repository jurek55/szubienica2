<?php
session_start();

require_once "testy.php";

/*if (($_SESSION['blad']>11) || ($_SESSION['success']==true)){
    header('Location: poczatek.php');
}*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Szubienica</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Mono&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script rel="javascript" src="jquery321.js"></script>
    <script rel="javascript" src="klawiaturaaktywna.js" type="text/javascript"></script>
</head>

<body>

<input type="hidden"  id="jsonexp" value='<?php echo $json_exp ?>'>
<div class="container">
<header>HASŁO DO ODGADNIĘCIA</header>
<div class="haslo"></div>

<div class="kategoria">
<header>Wybrana kategoria:</header>
<section class="kategoria" id="kat"></section>
</div>

<div class="obraz"></div>
</div>

<div class="klawiatura"></div>
<input type="hidden" id="litA" value="<?php echo $_SESSION['l0'] ?>">
<input type="hidden" id="litĄ" value="<?php echo $_SESSION['l1'] ?>">
<input type="hidden" id="litB" value="<?php echo $_SESSION['l2'] ?>">
<input type="hidden" id="litC" value="<?php echo $_SESSION['l3'] ?>">
<input type="hidden" id="litĆ" value="<?php echo $_SESSION['l4'] ?>">
<input type="hidden" id="litD" value="<?php echo $_SESSION['l5'] ?>">
<input type="hidden" id="litE" value="<?php echo $_SESSION['l6'] ?>">
<input type="hidden" id="litĘ" value="<?php echo $_SESSION['l7'] ?>">
<input type="hidden" id="litF" value="<?php echo $_SESSION['l8'] ?>">
<input type="hidden" id="litG" value="<?php echo $_SESSION['l9'] ?>">
<input type="hidden" id="litH" value="<?php echo $_SESSION['l10'] ?>">
<input type="hidden" id="litI" value="<?php echo $_SESSION['l11'] ?>">
<input type="hidden" id="litJ" value="<?php echo $_SESSION['l12'] ?>">
<input type="hidden" id="litK" value="<?php echo $_SESSION['l13'] ?>">
<input type="hidden" id="litL" value="<?php echo $_SESSION['l14'] ?>">
<input type="hidden" id="litŁ" value="<?php echo $_SESSION['l15'] ?>">
<input type="hidden" id="litM" value="<?php echo $_SESSION['l16'] ?>">
<input type="hidden" id="litN" value="<?php echo $_SESSION['l17'] ?>">
<input type="hidden" id="litŃ" value="<?php echo $_SESSION['l18'] ?>">
<input type="hidden" id="litO" value="<?php echo $_SESSION['l19'] ?>">
<input type="hidden" id="litÓ" value="<?php echo $_SESSION['l20'] ?>">
<input type="hidden" id="litP" value="<?php echo $_SESSION['l21'] ?>">
<input type="hidden" id="litQ" value="<?php echo $_SESSION['l22'] ?>">
<input type="hidden" id="litR" value="<?php echo $_SESSION['l23'] ?>">
<input type="hidden" id="litS" value="<?php echo $_SESSION['l24'] ?>">
<input type="hidden" id="litŚ" value="<?php echo $_SESSION['l25'] ?>">
<input type="hidden" id="litT" value="<?php echo $_SESSION['l26'] ?>">
<input type="hidden" id="litU" value="<?php echo $_SESSION['l27'] ?>">
<input type="hidden" id="litV" value="<?php echo $_SESSION['l28'] ?>">
<input type="hidden" id="litW" value="<?php echo $_SESSION['l29'] ?>">
<input type="hidden" id="litX" value="<?php echo $_SESSION['l30'] ?>">
<input type="hidden" id="litY" value="<?php echo $_SESSION['l31'] ?>">
<input type="hidden" id="litZ" value="<?php echo $_SESSION['l32'] ?>">
<input type="hidden" id="litŹ" value="<?php echo $_SESSION['l33'] ?>">
<input type="hidden" id="litŻ" value="<?php echo $_SESSION['l34'] ?>">

</body>
</html>
    