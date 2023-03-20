document.body.addEventListener('load', getProducts())

let data = null;

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

function showProducts(){

    const div = document.getElementById('productRow');
    div.innerHTML = "";


    data.forEach(product => {

            
                
        const divCol = document.createElement('div');
        divCol.className = 'col';

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

        ul.appendChild(h5);
        ul.appendChild(liPrice);
        ul.appendChild(liCode);

        divRow1.appendChild(divCol1);

        divRow2.appendChild(divCol2);
       
        divCol2.appendChild(ul);

        divCol.appendChild(divRow1);
        divCol.appendChild(divRow2);

        div.appendChild(divCol)
            
        
    });
}

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