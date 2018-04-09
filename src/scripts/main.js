const handCards = document.querySelectorAll(".allyBoard .hand .card");



const cardHandling = (i, e)=>{
    console.log(handCards[i])
}

for(let i = 0; i< handCards.length; i++){
    handCards[i].addEventListener("click", ()=>{
        cardHandling(i);
    })
}

