<?php

class Losowanie{
    private $polaczenie;
    private $kategoria;

    public function DbConnection(){
        require_once "connect.php";
        $this->kategoria=$_GET['kategoria'];
        $this->polaczenie=new mysqli($hostname, $username, $user_password, $db_name);
        if ($this->polaczenie->connect_errno!=0){
            echo 'Błąd połączenia, sprawdź parametry połączenia';
        } else{
            $this->polaczenie->query("SET CHARSET utf8");
            $this->polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        }
    }

    public function DbDisconnection(){
        $this->polaczenie->close();
    }
    
    public function Haslo(){
        $sql_has = "(select *, upper(haslo) as haslo from hasla where kategoria=$this->kategoria)";
        $hasla_zestaw=$this->polaczenie->query($sql_has);
        $liczba_hasel=$hasla_zestaw->num_rows;
        $numer_hasla=rand(0,$liczba_hasel-1);
        if ($liczba_hasel!=0){
            while ($wiersz=$hasla_zestaw->fetch_assoc()){
                $tablica[]=$wiersz['haslo'];
                $tablica1[]=ucfirst($wiersz['panstwa']);
                }
            $_SESSION['panstwo']=$tablica1[$numer_hasla];
            return $tablica[$numer_hasla];
        } else echo 'Nie ma haseł w tej kategorii';
    }       
    public function Kategoria(){
        $sql_kat = "(select kategoria from kategoria where id_kat=$this->kategoria)";
        $wynik=$this->polaczenie->query($sql_kat);
        
        $liczba_kat= $wynik->num_rows;
        if ($liczba_kat!=0){
            $wiersz=$wynik->fetch_assoc();
            return $wiersz['kategoria'];
        } else echo 'Nie odnaleziono żadnej kategorii';  
    }
    public function Kat(){
        return $this->kategoria;
    }
}

