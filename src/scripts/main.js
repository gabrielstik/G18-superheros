////////// query selector ///////
const cards = document.querySelectorAll(".card")
const hand = document.querySelector(".allyBoard .hand")
let handCards = hand.querySelectorAll(".card")
const field = document.querySelector(".field")
const fieldSlots = field.querySelectorAll(".field_slots")
const passTurn = document.querySelector(".passTurn")
const energyLeft = document.querySelector(".energyLeft")
const energyTotal = document.querySelector(".energyTotal")
const deck = document.querySelector(".deck")


console.log(deck.firstChild)

////////// global variable ///////

//hand position is vital to place the card correctly in the fields(used in cardMovement())
const fieldPosition = { x:field.offsetLeft - field.offsetWidth/2,
                        y:field.offsetTop }


//hand position is vital to move the card correctly (used in cardMovement())
const handPosition = {  x:hand.offsetLeft - hand.offsetWidth/2,
                        y:hand.offsetTop }


//mouse coord (used in mousemove and cardMovement())
const mouse = { x: 0, y: 0 }

//current card is the card clicked (used in cardHandling())
let currentCard;

//is the end button was clicked
let endTurn = 0

let energy = 5

//////////////////////////////////////////////////////////////////////////////////////////////////
        ////////// function  //////////
//////////////////////////////////////////////////////////////////////////////////////////////////

//wich card is clicked (used in click)
const cardHandling = (i, e)=>{
    currentCard = handCards[i]
    console.log(handCards[i])
    return currentCard
}
//make the card move alongside the mouse (used in mouseMove())
const cardMovement = ()=>{
    if (currentCard){
        //so the card can only move while in your hand
        if(currentCard.parentElement.className === "hand"){
            console.log("tutut")
            // make the card position and the mouse in tune
            let cardPosition = {x: mouse.x - handPosition.x - currentCard.offsetLeft,
                                y: mouse.y - handPosition.y - currentCard.offsetTop }
            

            //move the card
            currentCard.style.transform = "translateX(" + cardPosition.x + "px) translateY(" + cardPosition.y +"px)"
        }
    }
}

//return the card to it's original position in hand (used in mouseup)
const cardMovementInitialPosition = ()=>{
    if (currentCard){
        //the delay is necessary so the current cardCard stay a bit for the slotsCardsDectection() 
        setTimeout(() => {
        currentCard.style.transform = ""
        currentCard = 0;
        }, 0); 
    }
}
//put the card to a slot (used in mouseup)
const slotsCardsDetection = ()=>{
    for(let i = 0; i< fieldSlots.length; i++){
        const fieldSlotsPosition = {w:fieldSlots[i].offsetWidth,
                                    h:fieldSlots[i].offsetHeight,
                                    x:fieldPosition.x + fieldSlots[i].offsetLeft,
                                    y:field.offsetTop - fieldSlots[i].offsetHeight*60/100
                                    }
        const moreThanLeftCornerX = mouse.x > fieldSlotsPosition.x
        const lessThanRightCornerX = mouse.x < fieldSlotsPosition.x + fieldSlotsPosition.w
        const moreThanLeftCornerY = mouse.y > fieldSlotsPosition.y
        const lessThanRightCornerY = mouse.y < fieldSlotsPosition.y + fieldSlotsPosition.h
        if( moreThanLeftCornerX && lessThanRightCornerX && moreThanLeftCornerY && lessThanRightCornerY){
            if(currentCard){
                if(energy>0){
                    fieldSlots[i].style.backgroundColor = "yellow"
                    console.log(currentCard)
                    fieldSlots[i].appendChild(currentCard)
                    lowerEnergy()
                }
            }
        }
   
    }
}

// end turn (used in click on passTurn)
const endingTurn = ()=>{
    endTurn = 1
    console.log(endTurn)
}

//lower energy and update the text (used in cardDraw and slotsCardsDetection)
const lowerEnergy =()=>{
    energy--
    energyLeft.innerHTML= energy
}

//draw card when click on the deck (used in click on deck)
const cardDraw = ()=>{
    if(deck.childElementCount>0){
        if(energy>0){
        hand.appendChild(deck.firstElementChild)
        console.log("draw")
        lowerEnergy()
        putMouseDownListenerOnHandCards()
        console.log(handCards)
        }   
    }
}

//every time we draw a card we need to update the mouse down because we're adding card in the hand
const putMouseDownListenerOnHandCards = () =>{
    handCards = hand.querySelectorAll(".card")
    for(let i = 0; i< handCards.length; i++){
        handCards[i].addEventListener("mousedown", ()=>{
            currentCard = cardHandling(i)
        })
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////
        ////////// addEventListener  //////////
//////////////////////////////////////////////////////////////////////////////////////////////////


// event listener when you click a card tell which one it is

putMouseDownListenerOnHandCards()

//event listener when you move the mouse
document.addEventListener('mousemove', (event) =>
{
    mouse.x = event.clientX
    mouse.y = event.clientY
    //make the card move alongside the mouse
    cardMovement()
    
})

// event listener when you drop the mouse
document.addEventListener('mouseup',()=>{
    cardMovementInitialPosition()
    slotsCardsDetection()

})

passTurn.addEventListener("click",()=>{
    endingTurn()
})


deck.addEventListener("click",()=>{
    cardDraw()
})



cards.forEach(card => {
    // console.log(card.querySelector(".cardFront .cardStats .attack").dataset.attack)
    // console.log(card.querySelector(".cardFront .cardStats .defence").dataset.defence)
    // console.log(card.querySelector(".cardFront .cardStats .speed").dataset.speed)
    // console.log("intel" + card.querySelector(".cardFront .cardStats .inteligence").dataset.inteligence)

})

fieldSlots.forEach(fieldSlot => {
    console.log()
})


// 