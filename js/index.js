document.body.addEventListener('load', getProducts(), getCategory());
document.getElementById('radio-buttons').addEventListener('click', filterProducts());

let data = null;

function filterProducts(){
    alert('virttu')
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
        data = JSON.parse(this.responseText);
        showRadio();
    }

    ajax.open("GET", "backend/getCategory.php");
    ajax.send();
}

let buttonCount = 1;

function showRadio(){

    buttonCount++;
    console.log(data);

    const div = document.getElementById('radio-buttons');


    data.forEach(filters =>{
        const div2 = document.createElement('div');
        div2.localName = 'form check';
    
        const i = document.createElement('input');
        i.className = 'form-check-input';
        i.type = 'radio';
        i.name = 'optionsRadio';
        i.setAttribute('id', filters.category);

        const label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = 'optionsRadio' + buttonCount;
        const labelText = document.createTextNode('Show ' + filters.category);
        label.appendChild(labelText);

        div2.appendChild(i);
        div2.appendChild(label);

        div.appendChild(div2);
    
    })
}



function showProducts(){

    const div = document.getElementById('order-row');
    div.innerHTML = "";

    console.log(data)

    let category = 'moikka'


    // if(document.getElementById('gender_Male').checked) {

    productToShow = data.filter((product) => {
        console.log(product)
        if (category === 'all') {
            return true
        }
        return product.category === category
    })

    console.log(productToShow)

    productToShow.forEach(product => {
             

        const col1 = document.createElement('div');
        col1.className = 'col col-sm-3'
            
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

        div.appendChild(col1);
    });
}


// <div class="card" style="width: 18rem;">
// <img class="card-img-top" src="..." alt="Card image cap">
// <div class="card-body">
//   <h5 class="card-title">Card title</h5>
//   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
// </div>


{/* <div class="col product-col moi">
    <div class="row img-row">
        <div class="col kuva-col moi">
                tänne kuva
        </div>
    </div>
    <div class="row info-row">
        <div class="col info-col moi">
            tänne tiedot li elementteihin
            <ul class="product-ul">
                  li elementit
            </ul>
        </div>
    </div>
</div> */}