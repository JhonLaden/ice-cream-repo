const itemElement = document.getElementsByClassName('item');
const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName('minus');
var cardList = [];




for (var i = 0; i < plus.length; i++){
    var plusbtn = plus[i];

    plusbtn.addEventListener('click', function(e){
        const plusClicked = e.target;
        const card = plusClicked.parentNode.parentNode.parentNode;

        var value = plusClicked.previousElementSibling;
        var value_int = (+value.textContent);
        value_int++;
        value.textContent = value_int;


        card.classList.add('active');   
        updateWantList(card, true);
        renderWantList();
    });
}

for (var i = 0; i < minus.length; i++){
    var minusbtn = minus[i];

    minusbtn.addEventListener('click', function(e){
        const minusClicked = e.target;
        const card = minusClicked.parentNode.parentNode.parentNode;

        var value = minusClicked.nextElementSibling;
        var value_int = (+value.textContent);
        value_int--;

        if(value_int <= 0){
            card.classList.remove('active');
            if(value_int < 0) value_int = 0;
        }
        value.textContent = value_int;
    });
}

function updateWantList( card, isAdd){
    //details of the incremented card
    var wantList = document.getElementsByClassName('want-list')[0];
    const itemTitle = card.getElementsByClassName('brand')[0].textContent;
    const itemCount = card.getElementsByClassName('item-count')[0].textContent;
    const cardValue = card.getElementsByClassName('value')[0].textContent;

    // creating tags
    var newCard = document.createElement('li')
    var icon = document.createElement('span');
    var want = document.createElement('div');
    var details = document.createElement('div');    
    var price = document.createElement('div');

    var counterName = document.createElement('div');
    var itemCounter = document.createElement('span');
    var itemName = document.createElement('span');
    var itemQuant = document.createElement('span');

    // adding class name
    newCard.classList.add('item');
    newCard.classList.add('animated-entrance');
    icon.classList.add('x-mark');
    icon.innerHTML = `<i class='bx bxs-trash icon'></i>`;
    want.classList.add('want-item');
    details.classList.add('details');
    counterName.classList.add('counter-name');
    itemCounter.classList.add('item-counter');
    itemName.classList.add('item-name');
    itemQuant.classList.add('quantity');
    price.classList.add('price');

    // appending..
    counterName.appendChild(itemCounter);
    counterName.appendChild(itemName);
    counterName.appendChild(itemQuant);
    
    details.appendChild(counterName);
    details.appendChild(price);

    want.appendChild(details);

    newCard.appendChild(icon);
    newCard.appendChild(want);

    // adding value for each tag
    var newCardItemCounter = newCard.getElementsByClassName('item-counter')[0];
    var newCardItemName = newCard.getElementsByClassName('item-name')[0];
    var newCardItemQuant = newCard.getElementsByClassName('quantity')[0];
    var newCardPrice = newCard.getElementsByClassName('price')[0];


    // assigning value to temp variables
    newCardItemCounter.textContent = cardList.length+1;
    newCardItemName.textContent = itemTitle;
    newCardItemQuant.textContent = itemCount;
    newCardPrice.textContent = (cardValue);



    if(validateDuplicateList(newCard)){
        console.log('true');
        cardList.push(newCard);
    }else{
        console.log('false')
        for(var i = 0; i< cardList.length; i++){
            var cardListTitle = cardList[i].getElementsByClassName('item-name')[i];
            var newCardTitle = newCard.getElementsByClassName('item-name')[0];

            if(cardListTitle == newCardTitle){
                cardList[0].getElementsByClassName('quantity')[0].textContent = newCardItemQuant;
            }
        }
    }

    // if(isAdd){
    //     var newCardTitle = newCard.getElementsByClassName('item-name');
    //     console.log(newCardTitle);
    //     for(var i = 0; i < cardList.length; i++){
    //         var oldCardTitle = cardList[i].getElementsByClassName('item-name');
    //         console.log(oldCardTitle);
    //         if(newCardTitle == oldCardTitle){
    //             itemCount = newCard.getElementsByClassName('quantity');
    //             cardList.push(newCard);
    //             break;
    //         }
    //     }

    // }
  
}

function renderWantList(){
    var wantList = document.getElementsByClassName('want-list')[0];

    for(var i = 0; i < cardList.length; i++){
        wantList.appendChild(cardList[i]);
        setTimeout(removeAllanimation, 800)
    }

}

function removeAllanimation(){
    for(var i = 0 ; i < cardList.length; i++){
        cardList[i].classList.remove('animated-entrance');
    }
}

function validateDuplicateList(card){
    var cardName = card.getElementsByClassName('item-name');
    for(var i = 0; i < cardItems.length; i++){
    var cardItems = cardList.getElementsByClassName('item-name');

        if(cardName == cardItems[i]){
            return false;
        }
    }
    return true;
}