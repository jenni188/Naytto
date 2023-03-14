let productCount = 1;

document.getElementById('deleteProduct').addEventListener('click', deleteProduct);
document.getElementById('addProduct').addEventListener('click', addProduct);
document.forms['orderForm'].addEventListener('submit', sendOrder);

function sendOrder(event){
    event.preventDefault();

    const fname = document.forms['orderForm']['fname'].value;
    const lname = document.forms['orderForm']['lname'].value;
    const pnumber = document.forms['orderForm']['pnumber'].value;
    const email = document.forms['orderForm']['email'].value;

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


    // if (fname.length <= 0 ){
    //     alert("First name empty!")
    //     return;
    // }else if (lname.length <= 0 ){
    //     alert("Last name empty!")
    //     return;
    // }else if (email.length <= 0 ){
    //     alert("Email empty!")
    //     return;
    // }

    let postData = `fname=${fname}&lname=${lname}&pnumber=${pnumber}&email${email}`;
    let i = 0;
    let x = 0;
    products.forEach(function(product){
        postData += `&product${i++}=$product`
    })
    amounts.forEach(function(amount){
        postData += `&amount${x++}=$amount`
    })

    console.log(postData);

}

// lisätään uusi tuote
function addProduct(event){
    event.preventDefault();

    productCount++;

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
    inputType1.value = "text";
    input1.setAttributeNode(inputType1);
    
    const inputName1 = document.createAttribute('name');
    inputName1.value = `Product${productCount}`;
    input1.setAttributeNode(inputName1);

    const inputPlaceHolder1 = document.createAttribute('placeholder');
    inputPlaceHolder1.value = `Product ${productCount}`;
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
   const labelText2 = document.createTextNode(`Amount ${productCount}`);
   forAttribute2.value = `Amount${productCount}`;
   label2.setAttributeNode(forAttribute2);
   label2.appendChild(labelText2);
   // luodaan input määrälle
   const input2 = document.createElement('input');

   input2.classList.add('form-control');

   const inputType2 = document.createAttribute('type');
   inputType2.value = "number";
   input2.setAttributeNode(inputType2);
   
   const inputName2 = document.createAttribute('name');
   inputName2.value = `Product${productCount}`;
   input2.setAttributeNode(inputName2);

   const inputPlaceHolder2 = document.createAttribute('placeholder');
   inputPlaceHolder2.value = `Product ${productCount}`;
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
}

