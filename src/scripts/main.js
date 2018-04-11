////////// query selector ///////
const cards = document.querySelectorAll(".card")
const hand = document.querySelector(".allyBoard .hand")
let handCards = hand.querySelectorAll(".card")
const allyField = document.querySelector(".allyField")
const allyFieldSlots = allyField.querySelectorAll(".field_slots")
const ennemyFieldSlots = document.querySelectorAll(".ennemyField .field_slots")
const passTurn = document.querySelector(".passTurn")
const energyLeft = document.querySelector(".energyLeft")
const energyTotal = document.querySelector(".energyTotal")
const deck = document.querySelector(".deck")


console.log(deck.firstChild)

////////// global variable ///////

//hand position is vital to place the card correctly in the fields(used in cardMovement())
const fieldPosition = { x:allyField.offsetLeft - allyField.offsetWidth/2,
                        y:allyField.offsetTop }


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
    for(let i = 0; i< allyFieldSlots.length; i++){
        const allyFieldSlotsPosition = {
            w:allyFieldSlots[i].offsetWidth,
            h:allyFieldSlots[i].offsetHeight,
            x:fieldPosition.x + allyFieldSlots[i].offsetLeft,
            y:allyField.offsetTop - allyFieldSlots[i].offsetHeight*10/100
        }
        const moreThanLeftCornerX = mouse.x > allyFieldSlotsPosition.x
        const lessThanRightCornerX = mouse.x < allyFieldSlotsPosition.x + allyFieldSlotsPosition.w
        const moreThanLeftCornerY = mouse.y > allyFieldSlotsPosition.y
        const lessThanRightCornerY = mouse.y < allyFieldSlotsPosition.y + allyFieldSlotsPosition.h
        if( moreThanLeftCornerX && lessThanRightCornerX && moreThanLeftCornerY && lessThanRightCornerY){
            if(currentCard && currentCard.parentElement.className === "hand"){
                if(energy>0){
                    allyFieldSlots[i].style.backgroundColor = "yellow"
                    console.log(currentCard)
                    allyFieldSlots[i].appendChild(currentCard)
                    lowerEnergy()
                }
            }
        }
   
    }
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

// end turn (used in click on passTurn)
const endingTurn = ()=>{
    endTurn = 1
    console.log(endTurn)
    calculateSpeedOfTheTeam()
    console.log(allyFieldSlots)
    let statsOfAllyField = calculateStatsOfFields(allyFieldSlots)
    let statsOfEnnemyField = calculateStatsOfFields(ennemyFieldSlots)
    console.table(statsOfAllyField)
    console.table(statsOfEnnemyField)
    compareStats(statsOfAllyField, statsOfEnnemyField)

}


// calculate the stats of each cards existing in both fields 
const calculateStatsOfFields = (fieldSlots)=>{
    console.log(fieldSlots)
    const statsOfField = []
    //we are looking for each slots and each stats
    fieldSlots.forEach(fieldSlot=>{
        const attack = calculAttackOfFields(fieldSlot)
        const defense = calculDefenceOfFields(fieldSlot)
        const inteligence = calculInteligenceOfFields(fieldSlot)
        const stats = [attack, defense, inteligence]
        statsOfField.push(stats)
    })
    return statsOfField
}

const compareStats = (ally, ennemy)=>{
    for(let i = 0 ; i < ally.length; i++){
        for(let j = 0; j < ally.length; j++){
            if (j == 0){
                console.log("attack ally : " + i + " " + ally[i][j])
                console.log("attack ennemy : " + i + " " + ennemy[i][j])
            }
            if (j == 1){
                console.log("defence ally : " + i + " " + ally[i][j])
                console.log("defence ennemy : " + i + " " + ennemy[i][j])
            }
            if (j == 2){
                console.log("inteligence ally : " + i + " " + ally[i][j])
                console.log("inteligence ennemy : " + i + " " + ennemy[i][j])
            }
        }
    }
}

//calcul of the attack
const calculAttackOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("attack ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .attack").dataset.attack )
        return fieldSlot.querySelector(".card .cardFront .cardStats .attack").dataset.attack 
    }
}

//calcul of the inteligence
const calculInteligenceOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("inteligence ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .inteligence").dataset.inteligence )
        return fieldSlot.querySelector(".card .cardFront .cardStats .inteligence").dataset.inteligence 
    }
}

//calcul of the defence
const calculDefenceOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("defence ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .defence").dataset.defence )
        return fieldSlot.querySelector(".card .cardFront .cardStats .defence").dataset.defence 
    }
}

//calcul of the sum of speed of each team
const calculateSpeedOfTheTeam = () =>{
    let teamSpeed = 0
    allyFieldSlots.forEach(allyFieldSlot => {
        if (allyFieldSlot.querySelector(".card")){
            const speed = parseInt(allyFieldSlot.querySelector(".card .cardFront .cardStats .speed").dataset.speed)
            teamSpeed+=speed
        }
    })
    console.log(teamSpeed)
}

//lower energy and update the text (used in cardDraw and slotsCardsDetection)
const lowerEnergy =()=>{
    energy--
    energyLeft.innerHTML= energy
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




// 