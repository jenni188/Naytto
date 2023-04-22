//homeAdmin page js
window.addEventListener('load', getData1);
document.getElementById('radio-buttons').addEventListener('click', showProducts1);
document.getElementById('order-row').addEventListener('click', openProduct);
document.getElementById('createProduct-btn').addEventListener('click', openNewProduct);

let data = null;
let categories = null;

function getData1(){
    getProducts1()
    getCategory1()
}

//open page where you can create new products
function openNewProduct(){
    window.location.href = "newProduct.php";
}

function getProducts1(){
    console.log("haetaan data")

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        showProducts1();
    }

    ajax.open("GET", "backend/getProducts.php");
    ajax.send();
}

function getCategory1(){
    console.log("haetaan dataa");

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        categories = JSON.parse(this.responseText);
        showRadio1();
    }

    ajax.open("GET", "backend/getCategory.php");
    ajax.send();
}

let buttonCount = 1;

//creating radio buttons from categories
function showRadio1(){

    buttonCount++;

    const div = document.getElementById('radio-buttons');


    categories.forEach(filters =>{
        const div2 = document.createElement('div');
        div2.localName = 'form check';
    
        const i = document.createElement('input');
        i.className = 'form-check-input';
        i.type = 'radio';
        i.name = 'optionsradio';
        i.setAttribute('id', filters.category);
        i.setAttribute('value', filters.category)

        const label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = 'optionsradio' + buttonCount;
        const labelText = document.createTextNode('Show ' + filters.category);
        label.appendChild(labelText);

        div2.appendChild(i);
        div2.appendChild(label);

        div.appendChild(div2);
    
    })
}

//showing products 
async function showProducts1(){

    const div = document.getElementById('order-row');
    div.innerHTML = "";

    console.log(data)
    console.log('category value',  document.querySelector('input[name=optionsradio]:checked').value)
    let category = document.querySelector('input[name=optionsradio]:checked').value;


    // if(document.getElementById('gender_Male').checked) {

    productToShow = data.filter((product) => {
        console.log(product)
        if (category === 'all') {
            return true
        }
        return product.category === category
    })

    console.log('productToShow', productToShow)

    productToShow.forEach(async product => {
             
        const col1 = document.createElement('div');
        col1.className = 'col col-sm-3'
        col1.dataset.productid = product.id;

        const newDeleteBtn = document.createElement('button');
        newDeleteBtn.dataset.action = 'delete';
        newDeleteBtn.className = 'btn btn-primary btn-sm';
        const deleteText = document.createTextNode('delete');
        newDeleteBtn.appendChild(deleteText);

        const newEditBtn = document.createElement('button');
        newEditBtn.dataset.action = 'edit';
        newEditBtn.className = 'btn btn-warning btn-sm ';
        const editText = document.createTextNode('edit');
        newEditBtn.appendChild(editText);
            
        const card = document.createElement('div');
        card.className = 'card product-card';

        const img = document.createElement('img');
        img.className = 'card-img-top';

        // Get the image from database by id
        img.src = `backend/getImage.php?id=${product.id}`

        const body = document.createElement('div');
        body.className = ' card-body';

        const h = document.createElement('h5');
        h.className = 'card-title';
        const hText = document.createTextNode(product.name);
        h.appendChild(hText);

        const price = document.createElement('li');
        price.className = 'list-group-item';
        const pText = document.createTextNode("Price: " + product.price + "€");
        price.appendChild(pText);

        const code = document.createElement('li');
        code.className = 'list-group-item';
        const cText = document.createTextNode("Product code: " + product.code);
        code.appendChild(cText);

        body.appendChild(h);
        body.appendChild(price);
        body.appendChild(code);

        col1.appendChild(card);
        col1.appendChild(img);
        col1.appendChild(body);
        col1.appendChild(newDeleteBtn);
        col1.appendChild(newEditBtn);

        div.appendChild(col1);
    });
}

function openProduct(event){
    console.log(event.target.dataset);
    const action = event.target.dataset.action;

    if(action == 'delete'){
        let productId = event.target.parentElement.dataset.productid;
        deleteProduct(productId);
        return;
    }

   if(action == 'edit'){
       let productId = event.target.parentElement.dataset.productid;
       editProduct(productId);
       return;
   }
}

// open product editing page
function editProduct(id){
    window.location.href = "editProduct.php?id=" + id;
}

// delete product div
function deleteProduct(id){
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        let divToDelete = document.querySelector(`[data-productid= "${id}"]`);
        let parent = divToDelete.parentElement;
        parent.removeChild(divToDelete);
    }
    ajax.open("GET", "backend/deleteProduct.php?id=" + id);
    ajax.send();
}