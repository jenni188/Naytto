document.body.addEventListener('load', getPolls());
let data = null;


function getPolls(){
    console.log("haetaan data");
    
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        showPolls();
    }

    ajax.open("GET", "backend/getContact.php");
    ajax.send();
    console.log(data);
}

