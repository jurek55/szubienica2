<?php
function ZakreskujHaslo($haslo)
{
    $dlugosc=mb_strlen($haslo);
    $haslo1='';
    for ($i=0; $i<$dlugosc; $i++)
    {
        if($haslo[$i]!=' ')
        {
            $haslo1=$haslo1.'-';
        }
        else{
            $haslo1=$haslo1.$haslo[$i];
        }
    }
    return $haslo1;
}

function Napis($napis)
{
    echo $napis;
}
function WstawZnak($tekst, $tekst1, $znak)
{ for ($i=0; $i<mb_strlen($tekst1); $i++)
    {
        if ($tekst[$i]==$znak)
        {
            $tekst1=mb_substr($tekst1, $znak, $i,1);
        }
    }
    echo $tekst1;
}

function KlawiaturaAktywna()
{
    $litery=array("'A'","'Ą'","'B'","'C'","'Ć'","'D'","'E'","'Ę'","'F'","'G'","'H'","'I'","'J'","'K'","'L'","'Ł'","'M'","'N'","'Ń'","'O'","'Ó'","'P'","'Q'","'R'","'S'","'Ś'","'T'","'U'","'V'","'W'","'X'","'Y'","'Z'","'Ź'","'Ż'");
    for ($i=0; $i<35; $i++)
    if (($i)%5==0)
        {echo '<div style="clear: both;"></div>';
        echo '<div class="litera_akt" onclick="Napis('.$litery[$i].')">'.mb_substr($litery[$i],1,1).'</div>';}
    else{
        print '<div onclick="Napis('.$litery[$i].')" class="litera_akt">'.mb_substr($litery[$i],1,1).'</div>';
    }
}
function KlawiaturaNieaktywna()
{
    $litery=array("'A'","'Ą'","'B'","'C'","'Ć'","'D'","'E'","'Ę'","'F'","'G'","'H'","'I'","'J'","'K'","'L'","'Ł'","'M'","'N'","'Ń'","'O'","'Ó'","'P'","'Q'","'R'","'S'","'Ś'","'T'","'U'","'V'","'W'","'X'","'Y'","'Z'","'Ź'","'Ż'");
    for ($i=0; $i<35; $i++)
    if (($i)%5==0)
        {echo '<div style="clear: both;"></div>';
        echo '<div class="litera">'.mb_substr($litery[$i],1,1).'</div>';}
    else{
        echo '<div class="litera">'.mb_substr($litery[$i],1,1).'</div>';
    }
}
