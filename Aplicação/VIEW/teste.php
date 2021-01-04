<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insira o nome</title>
    <script>
        function verificar(){
            var texto=document.getElementById("entrada").value;
            for (letra of texto){
                if (!isNaN(texto)){
                    alert("Não digite números");
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
</script>
</head>
<body>
<input id="entrada" placeholder="Insira o nome" onchange="verificar()">
</body>
</html>