<?php


class Sprawdzenie {

private $trafienie;
private $sukces;


public function __construct(){
    $this->trafienie=false;
    $this->sukces=false;
    
}
/*public function UstawienieDanych(){
if (isset($_GET['kategoria'])){
    $losowanie=new Losowanie();
    $_SESSION['kategoria_wybrana']=$losowanie->Kategoria();
    $_SESSION['haslo']=$losowanie->Haslo();
}
$wylosowane_haslo = new Haslo($_SESSION['haslo']);
}*/

/*public function DanePoczatkowe($znak){
if (!isset($_GET['litera'])){
    $_SESSION['haslo_zakreskowane']=$wylosowane_haslo->ZakryjHaslo($znak);
    $_SESSION['liczba_prob']=0;
    
}
}*/

/*if (isset($_GET['litera'])){*/


public function SprawdzTrafienie($litera, $w_tekscie){
$haslo_zakresk=$wylosowane_haslo->WstawZnak($litera/*$_GET['litera']*/, $w_tekscie/* $_SESSION['haslo_zakreskowane']*/);
    
    if ($haslo_zakresk!=$w_tekscie /*$_SESSION['haslo_zakreskowane']*/){
        $w_tekscie/*$_SESSION['haslo_zakreskowane']*/=$haslo_zakresk;
        $trafienie=true;
        $obj=["trafienie": $trafienie, "litera": $litera];
        $json=encode($obj);
    }
    return $json;
}

/*

        $_SESSION['klasa'.$_GET['numer']] ='lit_traf';
        if ($haslo_zakresk==$_SESSION['haslo']){
            $sukces=true;
        }
    } else {
        $_SESSION['klasa'.$_GET['numer']] ='lit_pudlo';
        $_SESSION['liczba_prob']++;
    }
    if ($_SESSION['liczba_prob']>10){
        echo 'koniec';
    }
}*/
}
