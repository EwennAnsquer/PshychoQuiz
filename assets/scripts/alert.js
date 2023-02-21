
var data = document.getElementById("jsParams").getAttribute("data-error");

if(data==1){
    alert("❌ Veuillez finir toutes les Questions avant d'envoyer le formulaire.");
}else if(data==2){
    alert("❌ Veuillez remplir tous les champs avant d'envoyer le formulaire.");
}