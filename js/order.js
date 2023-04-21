let productCount = 1;
let amountCount = 1;

document.getElementById('deleteProduct').addEventListener('click', deleteProduct);
document.getElementById('addProduct').addEventListener('click', addProduct);
document.forms['orderForm'].addEventListener('submit', sendOrder);

function sendOrder(event){
    console.log('submit order')
    event.preventDefault();

    const fname = document.forms['orderForm']['fname'].value;
    const lname = document.forms['orderForm']['lname'].value;
    const pnumber = document.forms['orderForm']['pnumber'].value;
    const email = document.forms['orderForm']['email'].value;
    const select = document.getElementById('payment').value;

    const products = [];
    const amounts = [];

    const inputs = document.querySelectorAll('input');

    inputs.forEach(function(input){

        if (input.name.indexOf('product')== 0 ){
            products.push(input.value)
        } else if (input.name.indexOf('amount')== 0 ){
            amounts.push(input.value)
        } 
        
        console.log(products);
        
    })


     if (fname.length <= 0 ){
         showMessage('warning','First name needs to be inserted!');
         return;
     }else if (lname.length <= 0 ){
        showMessage('warning','last name needs to be inserted!');
         return;
     }else if (email.length <= 0 ){
        showMessage('warning','Email needs to be inserted!');
        return;
     }else if (pnumber.length <= 0 ){
        showMessage('warning','Phone number needs to be inserted!');
        return;
     }else if (products[0].length <= 0 ){
        showMessage('warning','Insert at least one product!');
        return;
     }

    let postData = `fname=${fname}&lname=${lname}&pnumber=${pnumber}&email=${email}&select=${select}`;
    let i = 0;
    let x = 0;
    products.forEach(function(product){
        postData += `&product${i++}=${product}`
    })
    amounts.forEach(function(amount){
        postData += `&amount${x++}=${amount}`
    })

    console.log(postData);

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('success')){
            window.location.href = "index.php?type=success&msg=Thank you for your order!"
        } else{
            showMessage('error',data.error);
        }
        console.log(data);
    }

    ajax.open("POST" , "backend/readOrder.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(postData);
    

}

// lisätään uusi tuote
function addProduct(event){
    event.preventDefault();

    productCount++;
    amountCount++;

    // luodaan uusi div row
    const rdiv = document.createElement('div');
    rdiv.className = 'row'

    // luodaan uusi div col
    const col1 = document.createElement('div');
    col1.className = 'col'

    // luodaan col 1 tuote
    const div1 = document.createElement('div');
    div1.className = 'form-group'

    //luodaan label tuotteelle
    const label1 = document.createElement('label');
    const forAttribute1 = document.createAttribute('for');
    const labelText1 = document.createTextNode(`Product ${productCount}`);
    forAttribute1.value = `Product${productCount}`;
    label1.setAttributeNode(forAttribute1);
    label1.appendChild(labelText1);

    // luodaan input tuotteelle
    const input1 = document.createElement('input');

    input1.classList.add('form-control');

    const inputType1 = document.createAttribute('type');
    inputType1.value = "number";
    input1.setAttributeNode(inputType1);

    const inputMin1 = document.createAttribute('min');
    inputMin1.value = "1";
    input1.setAttributeNode(inputMin1);

    
    const inputName1 = document.createAttribute('name');
    inputName1.value = `product${productCount}`;
    input1.setAttributeNode(inputName1);

    const inputPlaceHolder1 = document.createAttribute('placeholder');
    inputPlaceHolder1.value = `Product code ${productCount}`;
    input1.setAttributeNode(inputPlaceHolder1);

    rdiv.appendChild(col1);
    col1.appendChild(div1);
    div1.appendChild(label1);
    div1.appendChild(input1);


    // luodaan uusi div col
    const col2 = document.createElement('div');
    col2.className = 'col'
   // luodaan col 2 määrä
   const div2 = document.createElement('div');
   div2.className = 'form-group'
   // luodaan label määrälle
   const label2 = document.createElement('label');
   const forAttribute2 = document.createAttribute('for');
   const labelText2 = document.createTextNode(`Amount ${amountCount}`);
   forAttribute2.value = `amount${amountCount}`;
   label2.setAttributeNode(forAttribute2);
   label2.appendChild(labelText2);
   // luodaan input määrälle
   const input2 = document.createElement('input');

   input2.classList.add('form-control');

   const inputType2 = document.createAttribute('type');
   inputType2.value = "number";
   input2.setAttributeNode(inputType2);

    const inputMin2 = document.createAttribute('min');
    inputMin2.value = "1";
    input2.setAttributeNode(inputMin2);

   
   const inputName2 = document.createAttribute('name');
   inputName2.value = `amount${amountCount}`;
   input2.setAttributeNode(inputName2);

   const inputPlaceHolder2 = document.createAttribute('placeholder');
   inputPlaceHolder2.value = `Amount ${amountCount}`;
   input2.setAttributeNode(inputPlaceHolder2);

   rdiv.appendChild(col2);
   col2.appendChild(div2);
   div2.appendChild(label2);
   div2.appendChild(input2);

   console.log(rdiv);
   document.querySelector('fieldset').appendChild(rdiv);
}

function deleteProduct(event){

    event.preventDefault();

    if (productCount <= 1){
        return;
    }


    const productToDelete = document.querySelector('fieldset').lastElementChild;
    const parentElement = document.querySelector('fieldset');

    parentElement.removeChild(productToDelete);

    productCount--;
    amountCount--;
}

