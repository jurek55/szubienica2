<?php

class PanelAdmin{

    private $polecenie;

public function __construct(){
   if (isset($_POST['action'])){
        $this->polecenie=$_POST['action'];
    unset($_POST['action']);
    }
}
public function Rejestracja(){
    require_once 'connect.php';
    $polaczenie=new mysqli($hostname, $username, $user_password, $db_name);
    if (!$polaczenie->connect_errno){
        $user=$_POST['user'];
        $password=$_POST['password'];
        $action=$_POST['action'];
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $email=$_POST['email'];
        $sql="INSERT INTO uzytkownicy (user , email, haslo) VALUES ( '$user', '$email', '$hash')";
        $polaczenie->query($sql);
    $polaczenie->close();
    }
}

public function Logowanie(){
    require_once 'connect.php';
    $polaczenie=new mysqli($hostname, $username, $user_password, $db_name);
    if (!$polaczenie->connect_errno){
        $user=$_POST['user'];
        $password=$_POST['password'];
        //$email=$_POST['email'];
    $sql="SELECT * FROM uzytkownicy WHERE user='$user'";
    $wynik=$polaczenie->query($sql);
    $ile_wierszy=$wynik->num_rows;
        if ($ile_wierszy>0){
            $wiersz=$wynik->fetch_assoc();
            if (password_verify($password, $wiersz['haslo'])){
                echo 'Witaj '.$user.', zostałeś poprawnie zalogowany';
            } else {
                echo 'Nie masz uprawnień do pracy z bazą';
            }
        }
    }
}
public function Akcja(){
    if ($this->polecenie=='signin')
        $this->Logowanie();
    else
        $this->Rejestracja();
    }

}

class UzupelnijDane {

    public function NoweHaslo(){
        require_once 'connect.php';
        $polaczenie=new mysqli($hostname, $username, $user_password, $db_name);
        $polaczenie->query("SET CHARSET utf8");
        $polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        $sql='SELECT * FROM kategoria';
        $spis_kategorii=$polaczenie->query($sql);
        echo $spis_kategorii->num_rows; echo '<br>';
        $i=0;
        while ($wiersz=$spis_kategorii->fetch_assoc()){
            $numer_kat[]=$wiersz['id_kat'];
            $kategoria[]=$wiersz['kategoria'];
            echo $numer_kat[$i].' ';
            echo $kategoria[$i]; echo'<br>';
            $i++;
        }
    
    }
}

//$panel=new PanelAdmin();
//$panel->Akcja();
//$panel->Akcja();
$zmiana=new UzupelnijDane();
$zmiana->NoweHaslo();

