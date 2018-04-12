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
const allyLife = document.querySelector(".allyBoard .life")
const ennemyLife = document.querySelector(".ennemyBoard .life")
const deck = document.querySelector(".deck")

let speeder = 0

/////////// query selector forms ////////
const formLife = document.querySelector("input[name='life']")
const formSlot0 = document.querySelector("input[name='slot0']")
const formSlot1 = document.querySelector("input[name='slot1']")
const formSlot2 = document.querySelector("input[name='slot2']")
const formSlot3 = document.querySelector("input[name='slot3']")
const formSlot4 = document.querySelector("input[name='slot4']")
const formDefence0 = document.querySelector("input[name='cardDefence0']")
const formDefence1 = document.querySelector("input[name='cardDefence1']")
const formDefence2 = document.querySelector("input[name='cardDefence2']")
const formDefence3 = document.querySelector("input[name='cardDefence3']")
const formDefence4 = document.querySelector("input[name='cardDefence4']")
const formHand0 = document.querySelector("input[name='hand0']")
const formHand1 = document.querySelector("input[name='hand1']")
const formHand2 = document.querySelector("input[name='hand2']")
const formHand3 = document.querySelector("input[name='hand3']")
const formHand4 = document.querySelector("input[name='hand4']")
const formHand5 = document.querySelector("input[name='hand5']")
const formHand6 = document.querySelector("input[name='hand6']")



console.log(formLife)



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
                    console.log(allyFieldSlots[i].childElementCount)
                    if(allyFieldSlots[i].childElementCount == 0){
                        allyFieldSlots[i].style.backgroundColor = "yellow"
                        console.log(currentCard)
                        allyFieldSlots[i].appendChild(currentCard)
                        lowerEnergy()
                    }
                    else{
                        alert("you can't put two cards in the same field")
                    }
                }
                else{
                    alert("you need energy")
                }
            }
        }
   
    }
}

//draw card when click on the deck (used in click on deck)
const cardDraw = ()=>{
    if(deck.childElementCount>0){
        if(hand.childElementCount<7){
            if(energy>0){
            hand.appendChild(deck.firstElementChild)
            console.log("draw")
            lowerEnergy()
            putMouseDownListenerOnHandCards()
            console.log(handCards)
            }   
        }  
        else{
            alert("you have too much cards in hand")
        } 
    }
    else{
        alert("your deck is empty")
    }
}

//every time we draw a card we need to update the mouse down because we're adding card in the hand
const putMouseDownListenerOnHandCards = () =>{
    handCards = hand.querySelectorAll(".card")
    for(let i = 0; i< handCards.length; i++){
        handCards[i].addEventListener("mousedown", ()=>{
            currentCard = cardHandling(i)
            currentCard.querySelector(".cardFront").style.transform = "scale(1)"
        })
    }
}



// end turn (used in click on passTurn)
const endingTurn = ()=>{
    endTurn = 1
    passTurn.innerHTML = "waiting for opponent"
    
    //we calculate the speed of both board
    const allySpeed = calculateSpeedOfTheTeam(allyFieldSlots)
    const ennemySpeed = calculateSpeedOfTheTeam(ennemyFieldSlots)
    
    //we calculate who's faster
    speeder = calculateSpeeder(allySpeed, ennemySpeed)
    
    //put the stats of each board in an array (useless)
    let statsOfAllyField = calculateStatsOfFields(allyFieldSlots)
    let statsOfEnnemyField = calculateStatsOfFields(ennemyFieldSlots)
    console.table(statsOfAllyField)
    console.table(statsOfEnnemyField)
    if (speeder === "ally"){
        calculAttack(allyFieldSlots, ennemyFieldSlots, ennemyLife)
        //we put destroyCard end calculAttack before the other calculAttack so if a card or a hero die they can't strike back
        destroyCard(allyFieldSlots)
        destroyCard(ennemyFieldSlots)
        gameOutcome()
        calculAttack(ennemyFieldSlots, allyFieldSlots, allyLife)  
    }
    else{
        calculAttack(ennemyFieldSlots, allyFieldSlots, allyLife)
        destroyCard(allyFieldSlots)
        destroyCard(ennemyFieldSlots)
        gameOutcome()
        calculAttack(allyFieldSlots, ennemyFieldSlots, ennemyLife)

        
    }
    //destroy cards with less than 1 hp
    destroyCard(allyFieldSlots)
    destroyCard(ennemyFieldSlots)
    //refill the energy
    maxEnergy()
    //checking if the game is done
    gameOutcome()
    sendData()
    
}




const calculAttack = (first, second, life) =>{
    console.log("fqdsfdjqkfqdkmfjf" + first + second)
    for (let i = 0; i<first.length; i++ ){
        if (first[i].firstElementChild && second[i].firstElementChild){
            let defence = second[i].querySelector(".card .cardFront .cardStats .defence").innerHTML
            const inteligence = second[i].querySelector(".card .cardFront .cardStats .defence").innerHTML
            const attack = first[i].querySelector(".card .cardFront .cardStats .attack").innerHTML
            const dodge = Math.random()*inteligence < inteligence*20/100? true : false
            console.log(attack + defence)
            if(!dodge && defence>0){
                
                defence-=attack
            }
            second[i].querySelector(".card .cardFront .cardStats .defence").innerHTML = defence
            console.log(defence)
        }
        else if(first[i].firstElementChild){
            const attack = first[i].querySelector(".card .cardFront .cardStats .attack").innerHTML
            life.innerHTML -= attack
        }
    }
}

// destroy cards with less than 0 hp (used in end turn)
const destroyCard = (fieldSlots)=>{
    fieldSlots.forEach(fieldSlot => {
        if(fieldSlot.firstElementChild){
            if (fieldSlot.querySelector(".card .cardFront .cardStats .defence").innerHTML <= 0){
                fieldSlot.querySelector(".card").remove()
            }
        }
    })
}




// calculate the stats of each cards existing in both fields 
const calculateStatsOfFields = (fieldSlots)=>{
    console.log(fieldSlots)
    const statsOfField = []
    //we are looking for each slots and each stats
    fieldSlots.forEach(fieldSlot=>{
        // || 0 transform NaN into 0
        const attack = parseInt(calculAttackOfFields(fieldSlot)) || 0
        const defence = parseInt(calculDefenceOfFields(fieldSlot)) || 0
        const inteligence = parseInt(calculInteligenceOfFields(fieldSlot)) || 0
        const stats = [attack, defence, inteligence]
        statsOfField.push(stats)
    })
    return statsOfField
}

// const compareStats = (first, second)=>{
//     for(let i = 0 ; i < first.length; i++){
//         for(let j = 0; j < first.length; j++){
//             if (j == 0){
//                 console.log("attack first : " + i + " " + first[i][j])
//                 console.log("attack second : " + i + " " + second[i][j])
//             }
//             if (j == 1){
//                 console.log("defence first : " + i + " " + first[i][j])
//                 console.log("defence second : " + i + " " + second[i][j])
//             }
//             if (j == 2){
//                 console.log("inteligence first : " + i + " " + first[i][j])
//                 console.log("inteligence second : " + i + " " + second[i][j])
//             }
//         }
//     }
//  
// 
// 
// 
// 
// }

//calcul of the attack
const calculAttackOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("attack ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .attack").innerHTML )
        return fieldSlot.querySelector(".card .cardFront .cardStats .attack").innerHTML 
    }
}

//calcul of the inteligence
const calculInteligenceOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("inteligence ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .inteligence").innerHTML )
        return fieldSlot.querySelector(".card .cardFront .cardStats .inteligence").innerHTML 
    }
}

//calcul of the defence
const calculDefenceOfFields =(fieldSlot)=>{
    if (fieldSlot.querySelector(".card")){
        console.log("defence ally : " + fieldSlot.querySelector(".card .cardFront .cardStats .defence").innerHTML )
        return fieldSlot.querySelector(".card .cardFront .cardStats .defence").innerHTML 
    }
}

//calcul of the sum of speed of each team
const calculateSpeedOfTheTeam = (fieldSlots) =>{
    let teamSpeed = 0
    fieldSlots.forEach(fieldSlot => {
        if (fieldSlot.querySelector(".card")){
            const speed = parseInt(fieldSlot.querySelector(".card .cardFront .cardStats .speed").innerHTML)
            teamSpeed+=speed
        }
    })
    return teamSpeed
}

const calculateSpeeder = (allySpeed, ennemySpeed)=>{
    if( allySpeed > ennemySpeed){
        speeder = "ally"
    }
    else if(allySpeed < ennemySpeed){
        speeder ="ennemy"
    }
    else{
        speeder = Math.random() < 0.5 ? "ally" : "ennemy"
    }
    return speeder
}

//lower energy and update the text (used in cardDraw and slotsCardsDetection)
const lowerEnergy =()=>{
    energy--
    energyLeft.innerHTML= energy
}

const maxEnergy = ()=>{
    energy=energyTotal.dataset.energy
    energyLeft.innerHTML= energy
}

const gameOutcome = ()=>{
    if(allyLife.innerHTML < 1){
        alert("you lost")
    }
    if(ennemyLife.innerHTML < 1){
        alert("you won")
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
    if(currentCard){
        currentCard.querySelector(".cardFront").style.transform = "scale(1)"
    }
    
    mouse.x = event.clientX
    mouse.y = event.clientY
    //make the card move alongside the mouse
    cardMovement()
    
})

// event listener when you drop the mouse
document.addEventListener('mouseup',()=>{
    console.error("mouseup")
    cardMovementInitialPosition()
    if (endTurn == 0){
        slotsCardsDetection()
    }
})

//passing turn
passTurn.addEventListener("click",()=>{
    if (endTurn == 0){
        endingTurn()
    }
})

//drawing card
deck.addEventListener("click",()=>{
    if (endTurn == 0){
        cardDraw()
    }
})

cards.forEach(card => {
    card.addEventListener("mouseover",()=>{
        card.querySelector(".cardFront").style.transform = "scale(2)"
        card.style.zIndex = 10
        card.parentElement.style.zIndex = 10
        card.parentElement.parentElement.style.zIndex = 10
    }) 
    card.addEventListener("mouseleave",()=>{
        card.querySelector(".cardFront").style.transform = "scale(1)"
        card.style.zIndex = 1
        card.parentElement.style.zIndex = 1
        card.parentElement.parentElement.style.zIndex = 1
    }) 
})




const sendData = () =>{
    formLife.value = allyLife.innerHTML
    if(allyFieldSlots[0].childElementCount > 0){
        formSlot0.value = allyFieldSlots[0].querySelector(".card").dataset.id
    }
    if(allyFieldSlots[1].childElementCount > 0){
        formSlot1.value = allyFieldSlots[1].querySelector(".card").dataset.id
    }
    if(allyFieldSlots[2].childElementCount > 0){
        formSlot2.value = allyFieldSlots[2].querySelector(".card").dataset.id
    }
    if(allyFieldSlots[3].childElementCount > 0){
        formSlot3.value = allyFieldSlots[3].querySelector(".card").dataset.id
    }
    if(allyFieldSlots[4].childElementCount > 0){
        formSlot4.value = allyFieldSlots[4].querySelector(".card").dataset.id
    }
    if(allyFieldSlots[0].childElementCount > 0){
    formDefence0.value = allyFieldSlots[0].querySelector(".card .cardFront .cardStats .defence").innerHTML
    }
    if(allyFieldSlots[1].childElementCount > 0){
    formDefence1.value = allyFieldSlots[1].querySelector(".card .cardFront .cardStats .defence").innerHTML
    }
    if(allyFieldSlots[2].childElementCount > 0){
    formDefence2.value = allyFieldSlots[2].querySelector(".card .cardFront .cardStats .defence").innerHTML
    }
    if(allyFieldSlots[3].childElementCount > 0){
    formDefence3.value = allyFieldSlots[3].querySelector(".card .cardFront .cardStats .defence").innerHTML
    }
    if(allyFieldSlots[4].childElementCount > 0){
    formDefence4.value = allyFieldSlots[4].querySelector(".card .cardFront .cardStats .defence").innerHTML
    }
    handCards = hand.querySelectorAll(".card")
    if(handCards[0]){
        formHand0.value = handCards[0].dataset.id
    }
    if(handCards[1]){
        formHand1.value = handCards[1].dataset.id
    }
    if(handCards[2]){
        formHand2.value = handCards[2].dataset.id
    }
    if(handCards[3]){
        formHand3.value = handCards[3].dataset.id
    }
    if(handCards[4]){
        formHand4.value = handCards[4].dataset.id
    }
    if(handCards[5]){
        formHand5.value = handCards[5].dataset.id
    }
    if(handCards[6]){
        formHand6.value = handCards[6].dataset.id
    }
    
}




