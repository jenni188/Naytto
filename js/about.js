document.body.addEventListener('load', getText());

let data = null;

function getText(){
    console.log('Haetaann data');

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showText();
    }

    ajax.open("GET", "backend/getText.php");
    ajax.send();


}

function showText(){

    const ul = document.getElementById('about-ul');
    ul.innerHTML = "";

    data.forEach(text => {

        const newLi = document.createElement('li');
        newLi.className = 'list-group-item';

        const h2 = document.createElement('h2');
        const h2Text = document.createTextNode(text.heading);
        h2.appendChild(h2Text);

        const p = document.createElement('p');
        const pText = document.createTextNode(text.text);
        p.appendChild(pText);


        newLi.appendChild(h2);
        newLi.appendChild(p);

        ul.appendChild(newLi);
                
    });

}

{/* <li class="list-group-item">
<h2>
</h2>
<p>    
</p>
</li> */}