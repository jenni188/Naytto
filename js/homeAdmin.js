// home page admin js
document.body.addEventListener('load', getProducts1())
document.getElementById('productRow').addEventListener('click', openProduct);
document.getElementById('createProduct-btn').addEventListener('click', openNewProduct);


let data = null;

//open page where you can create new products
function openNewProduct(){
    window.location.href = "newProduct.php";
}

//get product data from database
function getProducts1(){
    console.log("haetaan data")

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showProducts();
    }

    ajax.open("GET", "backend/getProductsAdmin.php");
    ajax.send();
}

// showing products by creting div and buttons 
function showProducts(){

    const div = document.getElementById('productRow');
    div.innerHTML = "";


    data.forEach(product => {

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

        const body = document.createElement('div');
        body.className = ' card-body';

        const h = document.createElement('h5');
        h.className = 'card-title';
        const hText = document.createTextNode(product.name);
        h.appendChild(hText);

        const price = document.createElement('p');
        price.className = 'card-text';
        const pText = document.createTextNode("Price: " + product.price + "€");
        price.appendChild(pText);

        const code = document.createElement('p');
        code.className = 'card-text';
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