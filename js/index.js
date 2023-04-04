window.addEventListener('load', getData);
document.getElementById('radio-buttons').addEventListener('click', showProducts);

let data = null;
let categories = null;

function getData(){
    getProducts()
    getCategory()
}

function getProducts(){
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

function getCategory(){
    console.log("haetaan dataa");

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        categories = JSON.parse(this.responseText);
        showRadio();
    }

    ajax.open("GET", "backend/getCategory.php");
    ajax.send();
}

let buttonCount = 1;

function showRadio(){

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



async function showProducts(){

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

        div.appendChild(col1);
    });
}