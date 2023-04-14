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
    document.getElementById('product-image').src = `backend/getImage.php?id=${data.id}`
}

//send data to backend where it will be updated
function modifyProduct(event){
    event.preventDefault();

    // Check ir all fields are set
    const name = document.forms['editProduct']['p-name'].value;
    const price = document.forms['editProduct']['p-price'].value;
    const code = document.forms['editProduct']['p-code'].value;
    const category = document.forms['editProduct']['p-category'].value;
    
    if (name.length <= 0 || code.length <= 0 || category.length <= 0|| price.length <= 0){
        showMessage('error', 'Name, code, price and category must be set!');
        return;
    }

    // Create new FormData object
    const formData = new FormData(document.forms['editProduct']);

    
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('success')){
            window.location.href = "homeAdmin.php?type=success&msg=Product edited!"
        } else{
            showMessage('error',data.error);
        }
    }

    ajax.open("POST" , "backend/modifyProduct.php", true);
    ajax.send(formData);
}