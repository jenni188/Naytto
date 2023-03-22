const textQueryString = window.location.search;
const textParams = new URLSearchParams(textQueryString);

if (textParams.has('id')){
    getTextData(textParams.get('id'));
}

document.forms['editText'].addEventListener('submit', modifyText);

function getTextData(id){
    console.log(id);

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        populateTextForm(data);
    }
    ajax.open("GET", "backend/getTextEdit.php?id=" + id);
    ajax.send();
}

function populateTextForm(data){
    document.forms['editText']['id'].value = data.id;
    document.forms['editText']['heading'].value = data.heading;
    document.forms['editText']['text'].value = data.text;
}

function modifyText(event){
    event.preventDefault();
    console.log('save changes');


    let textData = {};

    textData.id = document.forms['editText']['id'].value;
    textData.heading = document.forms['editText']['heading'].value;
    textData.text = document.forms['editText']['text'].value;

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        let data = JSON.parse(this.responseText);
        if(data.hasOwnProperty('success')){
            window.location.href = 'aboutAdmin.php?type=success&msg=Text edited!';
        }else{
            showMessage('error', data.error);
        }
    }
    ajax.open("POST", "backend/modifyText.php", true);
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.send(JSON.stringify(textData));
}