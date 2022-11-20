const itemElement = document.getElementsByClassName('item');
const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName('minus');
const wantList = [];
var cardList = [`<li class="item">
<span class="x-mark">
    <i class='bx bxs-trash icon'></i>
</span>
<div class="want-item">
    <div class="details">
        <div class="counter-name">
            <span class="item-counter">1</span>
            <span class="item-name">Cookie</span>
            <span class="quantity">x2</span>
        </div>
    <div class="price">₱25.00</div>
</div>

</li>`,
`<li class="item">
<span class="x-mark">
    <i class='bx bxs-trash icon'></i>
</span>
<div class="want-item">
    <div class="details">
        <div class="counter-name">
            <span class="item-counter">2</span>
            <span class="item-name">Caramel</span>
            <span class="quantity">x3</span>
        </div>
    <div class="price">₱35.00</div>
</div>

</li>`,
`<li class="item">
<span class="x-mark">
    <i class='bx bxs-trash icon'></i>
</span>
<div class="want-item">
    <div class="details">
        <div class="counter-name">
            <span class="item-counter">3</span>
            <span class="item-name">Chocolate Bar</span>
            <span class="quantity">x1</span>
        </div>
    <div class="price">₱10.00</div>
</div>

</li>`,
`<li class="item">
<span class="x-mark">
    <i class='bx bxs-trash icon'></i>
</span>
<div class="want-item">
    <div class="details">
        <div class="counter-name">
            <span class="item-counter">4</span>
            <span class="item-name">Irish Cream coffee</span>
            <span class="quantity">x1</span>
        </div>
    <div class="price">₱25.00</div>
</div>

</li>`
];




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

    var newCard = 
    `
    <li class = "item animated-entrance">
        <span class="x-mark">
            <i class='bx bxs-trash icon'></i>
        </span>
        <div class="want-item">
            <div class="details">
                <div class="counter-name">
                    <span class="item-counter">${cardList.length+1}</span>
                    <span class="item-name">${itemTitle}</span>
                    <span class="quantity">x${itemCount}</span>
                </div>
            <div class="price">${cardValue}</div>
        </div>
    </li>
    `;
    cardList.push(newCard);
  
}

function renderWantList(){
    var wantList = document.getElementsByClassName('want-list')[0];
    var listString = '';
    for(var i = 0; i < cardList.length; i++){
        listString += cardList[i];
    }
    wantList.innerHTML = listString ;
    removeAllanimation();
}

function removeAllanimation(){
    for(var i = 0; i <cardList.length; i++){
        cardList[i] = cardList[i].replace('animated-entrance', '');
    }
}


