$(document).ready(function(){

    const json_kateg=$("#spis_kategorii").val();
    const obj_kateg=JSON.parse(json_kateg);
    
    var tekst='';
    var i=1;
    while (obj_kateg[i]){
        tekst=tekst+'<li><a href="/szubienica/start.php?kategoria='+i+'">'+obj_kateg[i]+'</li>';
        i++;
    }
    $("ol").html(tekst);
    });