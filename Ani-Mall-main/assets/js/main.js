// quantity buttons
let addButton=document.querySelector("#plusButton");
let minusButton=document.querySelector("#minusButton");
let quantityValue=document.querySelector("#quantValue");
let inputQuantity=document.querySelector("#quantityInput");
let quantity=1;
addButton.addEventListener("click",function(){
    if(quantity>12){
        quantity=13;
        inputQuantity.setAttribute("value",quantity);
        quantityValue.innerHTML=quantity;
        return;
    }
    inputQuantity.setAttribute("value",quantity);
    quantityValue.innerHTML=++quantity;
    
})
minusButton.addEventListener("click",function(){
    if(quantity<=1){
        quantity=1;
        inputQuantity.setAttribute("value",quantity);
        quantityValue.innerHTML=quantity;
    return;
    }
    inputQuantity.setAttribute("value",quantity);
    quantityValue.innerHTML=--quantity;
});
