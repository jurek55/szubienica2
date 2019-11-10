<?php

//$znak=$_GET['litera'];
class Haslo
{
    private $haslo_odkr;
    private $haslo_zakr;
    private $dlugosc;
  
    public function __construct($haslo_odkr){
        $this->haslo_odkr=$haslo_odkr;
        $this->dlugosc=mb_strlen($this->haslo_odkr);
        $this->haslo_zakr=$this->ZakryjHaslo('-');
       
    }
    public function WyswietlHaslo(){
        return $this->haslo_odkr;
    }

    public function ZakryjHaslo($symbol){
    $this->haslo_zakr='';
        for ($i=0; $i<$this->dlugosc; $i++)
        {
            if(mb_substr($this->haslo_odkr,$i,1)!=' ')
            {
                $this->haslo_zakr=$this->haslo_zakr.$symbol;
            }
            else{
                $this->haslo_zakr=$this->haslo_zakr.' ';
            }
        }
    return $this->haslo_zakr;
    }

    public function WstawZnak($znak, $zakryte_plus){
        for ($i=0; $i<$this->dlugosc; $i++){
        if (mb_substr($this->haslo_odkr, $i, 1)==$znak){   
            $zakryte_plus=mb_substr($zakryte_plus, 0, $i).$znak.mb_substr($zakryte_plus, $i+1, $this->dlugosc);
            }
        }
        return $zakryte_plus;
    }

    public function HasloZakryte(){
        return $this->haslo_zakr;  
    }
}
