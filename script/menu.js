const itemElement = document.getElementsByClassName('item');
const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName('minus');
const wantList = [];
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
    cardList.push(card);
}

function renderWantList(){
    var wantListCont = document.getElementsByClassName('want-list')[0];
    var itemRows = wantListCont.getElementsByClassName('item');

    for(var i = 0; i < itemRows.length; i++){
        console.log(itemRows[i]);
        var itemTitle = itemRows.getElementsByClassName('brand');
        var itemTitle = itemTitle.textContent;
        var htmlCard = 
        `<li class="item">
            <span class="x-mark">
                <i class='bx bxs-trash icon'></i>
            </span>
            <div class="want-item">
                <div class="details">
                    <div class="counter-name">
                        <span class="item-counter">1</span>
                        <span class="item-name">${itemTitle}</span>
                        <span class="quantity">x2</span>
                    </div>
                <div class="price">₱25.00</div>
            </div>
        </li>`;
        wantList.push(htmlCard);
    }
}

