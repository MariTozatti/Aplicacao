function verificar(){
    var texto=document.getElementById("entrada").value;
    for (letra of texto){
        if (!isNaN(texto)){
            alert("Digite caracteres válidos");
            document.getElementById("entrada").value="";
        return;
        }
        letraspermitidas="ABCEDFGHIJKLMNOPQRSTUVXWYZ abcdefghijklmnopqrstuvxwyzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ"
        var ok=false;
        for (letra2 of letraspermitidas ){
            if (letra==letra2){
                ok=true;
            }
        }
        if (!ok){
            alert("Não digite caracteres que não sejam letras ou espaços");
            document.getElementById("entrada").value="";
        return; 
        }
    }
}
