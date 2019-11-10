<?php
//session_start();
require_once "losowanie.php";
require_once "haslo.php";

class Objekt {

}

class PrzebiegGry {

private $trafienie;
private $sukces;
private $kategoria;
private $haslo;
private $haslo_;
private $losowanie_ob;
private $haslo_ob;

public function __construct(){
    $this->trafienie=false;
    $this->sukces=false;
    $this->kategoria='';
    $this->haslo='';
    $this->haslo_='';
    if (isset($_GET['kategoria'])){
    $this->losowanie_ob= new Losowanie();
    $this->haslo_ob= new Haslo($this->losowanie_ob->Haslo());
    } else {
        $this->haslo_ob= new Haslo($_SESSION['haslo']);  
    };
}

public function WyjecieDanychZBazy(){
    
    $this->kategoria=$this->losowanie_ob->Kategoria();
    $this->haslo =$this->haslo_ob->WyswietlHaslo();
    $this->haslo_=$this->haslo_ob->ZakryjHaslo('-');
}

public function GetData(){
    $obj_data = new Objekt();
    $obj_data->kategoria = $this->kategoria;
    $obj_data->haslo_ = $this->haslo_;
    $obj_data->haslo = $this->haslo;
    $json_data=json_encode($obj_data);
    return $json_data;
}

public function Set_Haslo_(){
    $this->haslo_= $_SESSION['_haslo_'];
}

public function Get_Haslo_(){
    $_SESSION['_haslo_'] = $this->haslo_;
}

public function SprawdzTrafienie($litera){
    $haslo_zakresk=$this->haslo_ob->WstawZnak($litera, $this->haslo_);
        
        if ($haslo_zakresk != $this->haslo_){
            $this->haslo_ = $haslo_zakresk;
            $this->trafienie = true;
            if ($this->haslo_==$_SESSION['haslo']){
                $this->sukces=true;
            }
        } else $this->CounterMistakes(false);
}   
public function GetTrafienie(){
    return $this->trafienie;
}

public function CounterMistakes($trafienie){
    if (!$trafienie)
        $_SESSION['blad']++;
    
}

public function GetSuccess(){
    return $this->sukces;
}

public function ResetKlawiatury(){
    if(($_SESSION['blad']>10) || ($this->GetSuccess())){
        for ($i=0; $i<35; $i++)
            $_SESSION['l'.$i]='litera_akt1';
    };
}
}

$test = new PrzebiegGry();

if (isset($_GET['kategoria'])){
    $test->WyjecieDanychZBazy();
    $_SESSION['js']=$test->GetData();
    $ob=json_decode($_SESSION['js']);
    $_SESSION['_haslo_']=$ob->haslo_;
    $_SESSION['haslo']= $ob->haslo;
    $_SESSION['kategoria']= $ob->kategoria;
}

if (isset($_SESSION['js'])){
    $test->Set_Haslo_();
    if (isset($_GET['litera'])){
        $test->SprawdzTrafienie($_GET['litera']);
        $test->Get_Haslo_();
    }
 
    $dane_exp = new Objekt();
    if (isset($_GET['odkryj'])){
        $_SESSION['_haslo_']=$_SESSION['haslo'];
        $dane_exp->wyswietl=true;
    }
    $dane_exp->haslo_nieodkryte = $_SESSION['_haslo_'];
    $dane_exp->kategoria = $_SESSION['kategoria'];
        if (isset($_GET['litera'])){
            $dane_exp->litera = $_GET['litera'];
            if ($test->GetTrafienie())
                $_SESSION['l'.$_GET['numer']]='lit_traf';
            else
                $_SESSION['l'.$_GET['numer']]='lit_pudlo';
        }
    $dane_exp->trafienie = $test->GetTrafienie();
    $dane_exp->liczba_bl = $_SESSION['blad'];
    $dane_exp->sukces=$test->GetSuccess();
    if ($test->GetSuccess()) $_SESSION['success']=true;
    $dane_exp->panstwo=$_SESSION['panstwo'];
    $json_exp = json_encode($dane_exp);
    $test->ResetKlawiatury();
    
}

?>
