$(document).ready(function(){

const json_kateg=$("#spis_kategorii").val();
const obj_kateg=JSON.parse(json_kateg);

var tekst='';
var i=1;
while (obj_kateg[i]){
    tekst=tekst+'<li>'+obj_kateg[i]+'</li>';
    i++;
}
$("ol:first").html(tekst);
});