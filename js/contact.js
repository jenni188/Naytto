
document.body.addEventListener('load', getPolls());
let data = null;




function getPolls(){

    console.log("haetaan data");
    
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        vittu();
    }

    ajax.open("GET", "backend/getContact.php");
    ajax.send();
    console.log(data);
}

function vittu(){
    const col = document.getElementById('contact-col');
    col.innerHTML= "";

    const newh2 = document.createElement('h2');
    newh2.className = "contact-col"
    const newh2Text = document.createTextNode('Contact information');
    newh2.appendChild(newh2Text);

    col.appendChild(newh2);

}

{/* <h2>Contact information</h2>
<p class="text" id="contact-text"></p> */}