
$(document).ready(function(){klawiatura.klawisze_d()});

var klawiatura = {
    klawisze_m: ['a','ą','b','c','ć','d','e','ę','f','g','h','i','j','k','l','ł','m','n','ń','o','ó','p','q','r','s','ś','t','u','v','w','x','y','z','ź','ż'],
    klaw: function(){
        return this.klawisze_m
    },
    klawisze_d: function(){
        var klawisze=[];
        this.klawisze_m.forEach(function(value){klawisze=klawisze+value.toUpperCase()});
        var wpis='';
        for (i=0;i<35;i++)
        if (i%5==0)
            wpis=wpis+'<div class="break"></div>'+ '<div class="litera_akt" onclick="Znak('+i+')">'+klawisze[i]+'</div>';
        else
            wpis = wpis + '<div class="litera_akt" onclick="Znak('+i+')">'+klawisze[i]+'</div>';
            $(".klawiatura").html(wpis);
        return klawisze;
    }
}
 function Znak(znak){
    var litera=klawiatura.klawisze_d()[znak];
    window.location.assign("start.php?litera="+litera);
    
 }

