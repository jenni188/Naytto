document.body.addEventListener('load', getProducts1())
document.getElementById('productRow').addEventListener('click', openProduct);
document.getElementById('createProduct-btn').addEventListener('click', openNewProduct);


let data = null;

function openNewProduct(){
    window.location.href = "newProduct.php";
}

function getProducts1(){
    console.log("haetaan data")

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showProducts();
    }

    ajax.open("GET", "backend/getProducts.php");
    ajax.send();
}

function showProducts(){

    const div = document.getElementById('productRow');
    div.innerHTML = "";


    data.forEach(product => {

            
                
        const divCol = document.createElement('div');
        divCol.className = 'col';
        divCol.dataset.productid = product.id;

        const divRow1 = document.createElement('div');
        divRow1.className = 'row'
        const divCol1 = document.createElement('div')
        divCol1.classList = 'col'

        const divRow2 = document.createElement('div');
        divRow2.className = 'row'
        const divCol2 = document.createElement('div')
        divCol2.classList = 'col'
        const ul = document.createElement('ul')



        const h5 = document.createElement('h5');
        const h5Text = document.createTextNode(product.name);
        h5.appendChild(h5Text);

        const liPrice = document.createElement('li');
        liPrice.className = 'list-group-item';
        const priceText = document.createTextNode("Price: " + product.price + "€");
        liPrice.appendChild(priceText);

        const liCode = document.createElement('li');
        liCode.className = 'list-group-item';
        const codeText = document.createTextNode("Product code: " + product.code);
        liCode.appendChild(codeText);

        const newDeleteBtn = document.createElement('button');
        newDeleteBtn.dataset.action = 'delete';
        newDeleteBtn.className = 'btn btn-primary btn-sm ml-3';
        const deleteText = document.createTextNode('delete');
        newDeleteBtn.appendChild(deleteText);

        const newEditBtn = document.createElement('button');
        newEditBtn.dataset.action = 'edit';
        newEditBtn.className = 'btn btn-warning btn-sm ';
        const editText = document.createTextNode('edit');
        newEditBtn.appendChild(editText);

        ul.appendChild(h5);
        ul.appendChild(liPrice);
        ul.appendChild(liCode);

        divRow1.appendChild(divCol1);

        divRow2.appendChild(divCol2);
       
        divCol2.appendChild(ul);

        divCol.appendChild(divRow1);
        divCol.appendChild(divRow2);

        divCol.appendChild(newDeleteBtn);
        divCol.appendChild(newEditBtn);

        div.appendChild(divCol)
            
        
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

function editProduct(id){
    window.location.href = "editProduct.php?id=" + id;
}

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