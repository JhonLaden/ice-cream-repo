const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName('minus');
const placeOrder = document.getElementsByClassName('place-order')[0];
const clearEl = document.getElementsByClassName('clear-button')[0];

var cardList = [];
const wantList1 = document.getElementsByClassName('want-list')[0];
const list1 = wantList1.getElementsByClassName('list-item');

if(window.localStorage.getItem('localCardList')){
    extract();
    render();   
}else{
    console.log('empty');
    doDisplay(false);
}

function store(){
    var localCardList = [];

    // iterate through the card list
    for(var i = 0 ; i < cardList.length; i++){

        // take the content of the card list and put it on the new card
        var cardListName = cardList[i].getElementsByClassName('item-name')[0].textContent;
        var cardListQuantity = cardList[i].getElementsByClassName('quantity')[0].textContent
        var cardListPrice = cardList[i].getElementsByClassName('price')[0].textContent;

        localCard = [];
        // putting it on the new card
        localCard.push(cardListName);
        localCard.push(cardListQuantity);
        localCard.push(cardListPrice);
        
        // push it to the list
        localCardList.push(localCard);
    }
    window.localStorage.setItem('localCardList', JSON.stringify(localCardList));
}

function extract(){
    var localCardList = [];

    localCardList = JSON.parse(window.localStorage.getItem('localCardList'));
    for (var i = 0; i < localCardList.length; i++){
        newCard = createCard();

        // take the value of array to text content of the new card
        newCard.getElementsByClassName('item-name')[0].textContent = localCardList[i][0];
        newCard.getElementsByClassName('quantity')[0].textContent = localCardList[i][1];
        newCard.getElementsByClassName('price')[0].textContent = localCardList[i][2];

        
        var xButton = newCard.getElementsByClassName('x-mark')[0];
        xButton.addEventListener('click',function(){
            newCard.classList.add('fade-out');
            setTimeout(function(){
                cardList = removeItemOnce(cardList, newCard);
                render();
            }, 700);
        });

        newCard.classList.remove('animated-entrance');

        cardList.push(newCard);
    }
}




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
        addToList(card);
        render();
        setTimeout(removeAllanimation, 700);


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

        deductFromList(card );
        render();
    });
}

function createCard(){
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
    newCard.classList.add('list-item');
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


    return newCard;
}

function addToList( card ){
    isRefresh_var = false;

    //details of the incremented card
    var wantList = document.getElementsByClassName('want-list')[0];
    const itemTitle = card.getElementsByClassName('brand')[0].textContent;
    const itemCount = card.getElementsByClassName('item-count')[0].textContent;
    const cardValue = card.getElementsByClassName('value')[0].textContent;

    // creating tags
    var newCard = createCard();

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

    // if x button is clicked
    var xButton = newCard.getElementsByClassName('x-mark')[0];
    xButton.addEventListener('click',function(){
        newCard.classList.add('fade-out');
        // card.getElementsByClassName('item-count')[0].textContent = 0;
        // card.classList.remove('active');
        setTimeout(function(){
            cardList = removeItemOnce(cardList, newCard);
            render();
        }, 700);
    });



    if(indexDuplicate(newCard) == -1 || cardList.length == 0){
        cardList.push(newCard);
    }else if(indexDuplicate(newCard) > -1){
        cardList[indexDuplicate(newCard)].getElementsByClassName('quantity')[0].textContent = newCard.getElementsByClassName('quantity')[0].textContent;
    }
}

function deductFromList(card){
    isRefresh_var = false;
    var newCard = createCard();

    //details of decremented card
    var wantList = document.getElementsByClassName('want-list')[0];
    const itemTitle = card.getElementsByClassName('brand')[0].textContent;
    const itemCount = card.getElementsByClassName('item-count')[0].textContent;
    const cardValue = card.getElementsByClassName('value')[0].textContent;

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

    //check duplicate 
    if(indexDuplicate(newCard) > -1){
        var inDup = indexDuplicate(newCard);
        cardList[indexDuplicate(newCard)].getElementsByClassName('quantity')[0].textContent = newCard.getElementsByClassName('quantity')[0].textContent;
        if(cardList[indexDuplicate(newCard)].getElementsByClassName('quantity')[0].textContent == 0){
            var val = cardList[indexDuplicate(newCard)];
            cardList[indexDuplicate(newCard)].classList.add('fade-out');
            setTimeout(function(){
                cardList = removeItemOnce(cardList, val)
                render();
            }, 700);
        }
    }
}

function stringToFloat(myNum){
    return parseFloat(myNum).toFixed(2);
}


function render(){
    var wantList = document.getElementsByClassName('want-list')[0];
    var total = document.getElementsByClassName('total')[0];
    var subTotal = document.querySelectorAll('.subtax-total .sub .value')[0];
    var discount = document.querySelectorAll('.subtax-total .disc .value')[0];
    var grandTotal = document.querySelectorAll('.subtax-total .grand-total .value')[0];
    
    // initializing
    subTotal.textContent = '0.00';
    discount.textContent = '0.00';
    grandTotal.textContent = '0.00';
    
    // initialize the want list as empty
    wantList.innerHTML = '';

    //if array is not empty
    if(cardList.length > 0){
        doDisplay(true);
        for(var i = 0; i < cardList.length; i++){
            //every iteration should remove peso sign for the card
            cardList[i].getElementsByClassName('item-counter')[0].textContent = (i+1);


            // getting price and quantity of the card
            var cardPrice = cardList[i].getElementsByClassName('price')[0].textContent.replace('₱','');
            var cardQuantity = cardList[i].getElementsByClassName('quantity')[0].textContent;

            // removing peso sign because of my stupidity
            subTotal.textContent = subTotal.textContent.replace('₱', '');
            discount.textContent = discount.textContent.replace('₱', '');
            grandTotal.textContent = grandTotal.textContent.replace('₱', '');


            //calculating subtotal...
            subTotal.textContent = (+subTotal.textContent) + ((+cardPrice) * (+cardQuantity));
            subTotal.textContent = addDecimals(subTotal.textContent);

            //calculating for discount...
            discount.textContent = getDiscountedValue((+subTotal.textContent), 10);
            discount.textContent = addDecimals(discount.textContent);

            //calculating for grand total
            grandTotal.textContent = ((+subTotal.textContent) - (+discount.textContent))
            grandTotal.textContent = addDecimals(grandTotal.textContent);

            // adding peso sign
            subTotal.textContent = "₱ " + subTotal.textContent;
            discount.textContent = "₱ " + discount.textContent;
            grandTotal.textContent = "₱ " + grandTotal.textContent;

            // add element to the list
            wantList.appendChild(cardList[i]);

        }
    }else{
        doDisplay(false);
    }
    store();

}
 
function getDiscountedValue(num, percent){
    var discountedNum = (num/100) * percent;
    return discountedNum;
}


function addDecimals(myString){
    if((+myString)%1 == 0){
        return myString + '.00';
    }
    return myString;
}

function removeAllanimation(){
    for(var i = 0 ; i < cardList.length; i++){
        cardList[i].classList.remove('animated-entrance');
        cardList[i].classList.remove('fade-out');

    }   
}

function indexDuplicate(card){
    var cardName = card.getElementsByClassName('item-name')[0];
    for(var i = 0; i < cardList.length; i++){
        var cardItem = cardList[i].getElementsByClassName('item-name')[0];

        if(cardName.textContent == cardItem.textContent){
            return i;
        }
    }
    return -1;
}

function validateZero(arr){
    for (var i = 0; i < arr.length; i++){
        var quantity = arr[i].getElementsByClassName('quantity')[0];
        if(quantity.textContent == 0){
            fadeOut(i);
            arr = removeItemOnce(arr, arr[i]);
            render();
        }
    }
}

function fadeOut(i){
    cardList[i].classList.add('fade-out');
}

function removeItemOnce(arr, value) {
    var index = arr.indexOf(value);
    if (index > -1) {
      arr.splice(index, 1);
    }
    return arr;
  }

function doDisplay(bool){
    const listContainer = document.getElementsByClassName('list-container')[0];
    const totalContainer = document.getElementsByClassName('total-container')[0];
    const subtax = document.getElementsByClassName('subtax-total')[0];
    const total = document.getElementsByClassName('total')[0];
    const placeOrder = document.getElementsByClassName('place-order')[0];
    const dialog = document.getElementsByClassName('dialog')[0];
    const dummyEl = document.getElementsByClassName('dummy-element')[0];

    if(!bool){
        listContainer.classList.add('d-none');
        totalContainer.style =  "min-height: 85vh";
        subtax.classList.add('d-none');
        placeOrder.classList.add('d-none');
        dialog.classList.add('d-block');
        dialog.classList.remove('d-none');
        dummyEl.classList.add('d-block');
        clearEl.classList.add('d-none');
        
        // centering the dialog
        total.classList.add('d-flex');
        total.classList.add('flex-justify-center');
        total.classList.add('flex-align-center');
    }else{
        listContainer.classList.remove('d-none');
        totalContainer.style =  "min-height: 40vh";
        subtax.classList.remove('d-none');
        placeOrder.classList.remove('d-none');
        dialog.classList.remove('d-block');
        dummyEl.classList.remove('d-block');
        dummyEl.classList.add('d-none');
        clearEl.classList.remove('d-none');


        // centering the dialog
        total.classList.remove('d-flex');
        total.classList.remove('flex-justify-center');
        total.classList.remove('flex-align-center');

        dialog.classList.add('d-none');
    }
}

function clear_func(){
    const items = document.getElementsByClassName('item');
    window.localStorage.clear();
    for (var i = 0; i < 8; i++){
        var itemCount = items[i].getElementsByClassName('item-count')[0];
        itemCount.textContent = 0;
        items[i].classList.remove('active');
    }
    cardList = [];
    doDisplay(false);
    render();
}

clearEl.addEventListener('dblclick', clear_func);

placeOrder.addEventListener('click', function(){
    var itemNames = [];
    var itemQuantities = [];
    var itemPrices = [];
    var subTotal, discountTotal, grandTotal;

    for(var i = 0; i < cardList.length; i++){
        itemNames.push(cardList[i].getElementsByClassName('item-name')[0].textContent);
        itemQuantities.push(cardList[i].getElementsByClassName('quantity')[0].textContent);
        itemPrices.push(cardList[i].getElementsByClassName('price')[0].textContent);
        subTotal = document.querySelectorAll('.subtax .sub .value')[0].textContent;
        discountTotal = document.querySelectorAll('.subtax .disc .value')[0].textContent;
        grandTotal = document.querySelectorAll('.grand-total .value')[0].textContent;
    }
    var newhref = "";
    var itemTotal = 0;
    
    for (var i = 0; i < itemNames.length; i++){
        itemTotal = (+itemTotal) + parseInt(itemQuantities);
    }
    grandTotal = grandTotal.replace('₱ ', "");
    newhref = "http://localhost/ice-cream-repo/history/history.php?" + "itemTotal="+itemTotal+"&"+"grandTotal="+grandTotal;
    clear_func();
    placeOrder.setAttribute('href', newhref);

});

function sameName(itemName){
    
}