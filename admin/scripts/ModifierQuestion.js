document.querySelector("#typeInput").addEventListener("change",(e)=>{
    displayRepDiv();
})

displayRepDiv();

function displayRepDiv(){
    if(document.querySelector("#typeInput").selectedIndex==1){
        document.querySelector("#repDiv").style.display="none";
    }else{
        document.querySelector("#repDiv").style.display="block";
    }
}



