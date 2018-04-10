////////// query selector ///////
const hand = document.querySelector(".allyBoard .hand");
const handCards = hand.querySelectorAll(".card");

////////// global variable ///////

//hand position is vital to move the card correctly (used in cardMovement())
const handPosition = {  x:hand.offsetLeft - hand.offsetWidth/2,
                        y:hand.offsetTop }
console.log(handPosition)

//mouse coord (used in mousemove and cardMovement())
const mouse = { x: 0, y: 0 }

//current card is the card clicked (used in cardHandling())
let currentCard;

////////// function  ///////

//wich card is clicked (used in click)
const cardHandling = (i, e)=>{
    currentCard = handCards[i]
    console.log(handCards[i])
    return currentCard
}
//make the card move alongside the mouse (used in mouseMove())
const cardMovement = ()=>{
    if (currentCard){
        // make the card position and the mouse in tune
        let cardPosition = {x: mouse.x - handPosition.x - currentCard.offsetLeft,
                            y: mouse.y - handPosition.y - currentCard.offsetTop }
        const oldCardPosition = {x: cardPosition.x, y: cardPosition.y}
        console.log(cardPosition)
        //move the card
        currentCard.style.transform = "translateX(" + cardPosition.x + "px) translateY(" + cardPosition.y +"px)"
    }
}

console.log(hand.offsetLeft)

// event listener when you click a card tell which one it is
for(let i = 0; i< handCards.length; i++){
    console.log(handCards[i].style.width)
    handCards[i].addEventListener("click", ()=>{
        currentCard = cardHandling(i)
    })
}

//even listener when you move the mouse
document.addEventListener('mousemove', (event) =>
{
    mouse.x = event.clientX
    mouse.y = event.clientY
    console.log(mouse.x)
    //make the card move alongside the mouse
    cardMovement()
})