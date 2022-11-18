const itemElement = document.getElementsByClassName('item');
const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName('minus');

for (var i = 0; i < plus.length; i++){
    var plusbtn = plus[i];

    plusbtn.addEventListener('click', function(e){
        console.log('plus clicked')

        const plusClicked = e.target;
        const card = plusClicked.parentNode.parentNode.parentNode;

        var value = plusClicked.previousElementSibling;
        var value_int = (+value.textContent);
        value_int++;
        value.textContent = value_int;

        console.log(card);  
        card.classList.add('active');   
    });
}

for (var i = 0; i < minus.length; i++){
    var minusbtn = minus[i];

    minusbtn.addEventListener('click', function(e){
        console.log('minus clicked')

        const minusClicked = e.target;
        const card = minusClicked.parentNode.parentNode.parentNode;

        var value = minusClicked.previousElementSibling;
        var value_int = (+value.textContent);
        value_int--;
        value.textContent = value_int;

        console.log(card);  
        if(value_int <= 0){
            card.classList.remove('active');
        }
      
    });
}