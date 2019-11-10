
$(document).ready(function(){Klawisze()});

var klawiatura = {
    klawisze_m: ['a','ą','b','c','ć','d','e','ę','f','g','h','i','j','k','l','ł','m','n','ń','o','ó','p','q','r','s','ś','t','u','v','w','x','y','z','ź','ż'],
    
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
        wpis='';
        var wpis0 = '<div class="break"></div>';
        for (i=0;i<35;i++){
        var klasa = 'litera_akt';
            var wpis3='<button class="'+klasa+'" >'+this.klawisze_d()[i]+'</button>';
            if (i%5==0)
                wpis = wpis + wpis0 + wpis3;
            else 
                wpis = wpis + wpis3;
        };
        $(".klawiatura").html(wpis);
    },
    identyfikator: function(i){
        var id = this.klawisze_d()[i];
        return id;
    }
}
function Klawisze(){
    klawiatura.wstaw_klawisze();
}   







