//js to editing products
const productQueryString = window.location.search;
const productParams = new URLSearchParams(productQueryString);

if (productParams.has('id')){
    getProductData(productParams.get('id'));
}

document.forms['editProduct'].addEventListener('submit', modifyProduct);

//get product data from database
function getProductData(id){
    console.log(id);

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        populateProductForm(data);
    }
    ajax.open("GET", "backend/getProductEdit.php?id=" + id);
    ajax.send();
}

//prepare variables
function populateProductForm(data){
    document.forms['editProduct']['id'].value = data.id;
    document.forms['editProduct']['p-name'].value = data.name;
    document.forms['editProduct']['p-price'].value = data.price;
    document.forms['editProduct']['p-code'].value = data.code;
    document.forms['editProduct']['p-category'].value = data.category;
    document.forms['editProduct']['p-img'].value = data.category;
}

//send data to backend where it will be updated
function modifyProduct(event){
    event.preventDefault();
    console.log('save changes');


    let productData = {};

    // variables to an array
    productData.id = document.forms['editProduct']['id'].value;
    productData.name = document.forms['editProduct']['p-name'].value;
    productData.price = document.forms['editProduct']['p-price'].value;
    productData.code = document.forms['editProduct']['p-code'].value;
    productData.category = document.forms['editProduct']['p-category'].value;
    productData.category = document.forms['editProduct']['p-img'].value;

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        let data = JSON.parse(this.responseText);
        if(data.hasOwnProperty('success')){
            window.location.href = 'homeAdmin.php?type=success&msg=Text edited!';
        }else{
            showMessage('error', data.error);
        }
    }
    ajax.open("POST", "backend/modifyProduct.php", true);
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.send(JSON.stringify(productData));
}