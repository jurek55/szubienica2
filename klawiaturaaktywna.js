

$(document).ready(function(){Gra()});


var aplauz = new Audio(src="sounds/aplauz.mp3");
var klawiatura = {
    klawisze_m: ['a','ą','b','c','ć','d','e','ę','f','g','h','i','j','k','l','ł','m','n','ń','o','ó','p','q','r','s','ś','t','u','v','w','x','y','z','ź','ż'],

    pozycje_menu: ['Wyświetl hasło','Nowe losowanie', 'Koniec gry'],
    
    klaw: function(){
        return this.klawisze_m
    },

    klawisze_d: function(){
        var klawisze=[];
        this.klawisze_m.forEach(function(value){klawisze=klawisze+value.toUpperCase()});
        return klawisze;
    },
    numer_elementu: function(znak){
        var i=0;
        while (this.klawisze_d()[i] != znak){
            i++;
        }
        return i;
    },

    wstaw_klawisze: function(){
        var wpis='';
        var wpis0 = '<div class="break"></div>';
        for (i=0;i<35;i++){
        var klasa = $("#lit"+this.klawisze_d()[i]).val();
            var wpis3='<button class="'+klasa+'" id="l'+this.klawisze_d()[i]+'">'+this.klawisze_d()[i]+'</button>';
            if (i%5==0)
                wpis = wpis + wpis0 + wpis3;
            else 
                wpis = wpis + wpis3;
        };
        $(".klawiatura").html(wpis);

        $("button").on("click",function(){   
            if($("#lit"+$(this).text()).val()=='litera_akt'){
                location.assign("start.php?litera="+$(this).text() +"&numer="+klawiatura.numer_elementu($(this).text()));
            } else $("#l"+$(this).text()).off("click");
        });
    },
        
    identyfikator: function(i){
        var id = this.klawisze_d()[i];
        return id;
    },

    wstaw_menu: function(wynik){
        wpis='';
        var k=0;
        if (wynik) k=1; else k=0;
        for (i=k; i<3; i++){
            wpis=wpis+'<button class="menu" id="m'+i+'">'+this.pozycje_menu[i]+'</button>'
        };

        $(".klawiatura").html(wpis);
        $(".klawiatura").hide();
        $(".klawiatura").show(1500);

        $(".menu").on("click", function(){
            var z=($(this).text());
            console.log(z);
        if (z==klawiatura.pozycje_menu[0])  location.assign("start.php?odkryj="+wynik);
        if (z==klawiatura.pozycje_menu[1])  location.assign("poczatek.php");
        if (z==klawiatura.pozycje_menu[2])  location.assign("https://wp.jkunicki.pl");

        });
    },

    timer: function(start){
        if (start>-2){
            var wpis='<div class="zegar" style="font-size: 70px; color: red;">'+start+' s</div>';
            if (start>0) {$(".klawiatura").html(wpis)} else $(".klawiatura").html('');
            start--;
            setTimeout(function(){klawiatura.timer(start)}, 1000);
        };
    },

    efekt_sukces: function(){

            $("img").hide(500, function(){
            $(".obraz").html('<a href="https://www.gify.net/cat-fajerwerki-i-sztuczne-ognie-492.htm"><img src="https://www.gify.net/data/media/492/fajerwerk-ruchomy-obrazek-0065.gif" border="0" alt="fajerwerk-ruchomy-obrazek-0065" /></a>');
            aplauz.play();
            $("img").hide();    
            $("img").show(1000); 
            setTimeout(function(){$("img").hide(10000)}, 10000);
            setTimeout(function(){$(".obraz").html("<img src='img/udalosie.png'>");
            $("img").hide();    
            $("img").show(1000);},15000);
            });
    },

    sprawdz_haslo: function(haslo){
        var dlugosc=haslo.length;
        var flaga=0;
        for (i=0; i<dlugosc; i++){
            if (haslo[i]=='-')
                flaga++;
        };
        return flaga;
    }
};

function Gra(){
    var wynikjson = $("#jsonexp").val();
    console.log(wynikjson);
    var wynikobj = JSON.parse(wynikjson);
    $(".haslo").text(wynikobj.haslo_nieodkryte);
    $("#kat").html(wynikobj.kategoria+': '+'<b>'+wynikobj.panstwo+'</b>');

    if ((wynikobj.liczba_bl<=10) && (!wynikobj.sukces))
        klawiatura.wstaw_klawisze();
    
   $(document).ready(function(){

        $(".obraz").html("<img src='img/mysle.png'>"); 

        if (wynikobj.sukces){
            klawiatura.efekt_sukces();
            klawiatura.timer(15);
            setTimeout(function(){location.assign('poczatek.php')}, 17000);
        };

       if ((wynikobj.liczba_bl>10) && (!wynikobj.sukces)){
            $("img").hide(500, function(){
            $(".obraz").html("<img src='img/ojej_prawo.png'>");
            $("img").hide();    
            $("img").show(1000); 
            });
            if (wynikobj.wyswietl==true)
                klawiatura.wstaw_menu(true);
            else
                klawiatura.wstaw_menu(false);
        };

    });

};







