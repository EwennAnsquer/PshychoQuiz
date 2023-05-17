const deleteBtn = document.querySelectorAll('[name="idDel"]');
const popupDelete= document.querySelector('#popupDelete');
const body = document.querySelector("body");
const main = document.querySelector(".main");
const inputIdDelete = document.querySelector("#inputIdDelete");
const refuseDelete = document.querySelector("#refuseDelete");

deleteBtn.forEach(e => {
    e.addEventListener("click",()=>{
        popupDelete.style.top=window.pageYOffset+(window.innerHeight/2)+'px';
        body.classList.add("dontMove");
        main.style.filter="blur(5px)";
        popupDelete.style.display="flex";
        inputIdDelete.setAttribute("value",e.value);
        popupDelete.querySelector("#pDeleteQuestion").textContent=e.parentElement.parentElement.querySelector(".libQuestion").textContent;
    })
});

refuseDelete.addEventListener("click",()=>{
    body.classList.remove("dontMove");
    popupDelete.style.display="none";
    main.style.filter="none";
})