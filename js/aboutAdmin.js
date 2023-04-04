//about admin page js

document.body.addEventListener('load', getText1());
document.getElementById('about-ul').addEventListener('click', openText);
document.getElementById('create-btn').addEventListener('click', openNew);

//open to crete new text
function openNew(){
    window.location.href = "newText.php";
}


let data = null;

//getting text data from data base
function getText1(){
    console.log('Haetaann data');

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showText1();
    }

    ajax.open("GET", "backend/getText.php");
    ajax.send();


}

//show text on page by creatig li elements
function showText1(){

    const ul = document.getElementById('about-ul');
    ul.innerHTML = "";

    data.forEach(text => {

        const newLi = document.createElement('li');
        newLi.dataset.textid = text.id;
        newLi.className = 'list-group-item';

        const h2 = document.createElement('h2');
        const h2Text = document.createTextNode(text.heading);
        h2.appendChild(h2Text);

        const p = document.createElement('p');
        p.className = 'row-3';
        const pText = document.createTextNode(text.text);
        p.appendChild(pText);

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



        newLi.appendChild(h2);
        newLi.appendChild(p);
        newLi.appendChild(newDeleteBtn);
        newLi.appendChild(newEditBtn);

        ul.appendChild(newLi);
                
    });

}

//open text edit page or delete the chosen text
function openText(event){
    console.log(event.target.dataset);
    const action = event.target.dataset.action;

     if(action == 'delete'){
         let textId = event.target.parentElement.dataset.textid;
         deleteText(textId);
         return;
     }

    if(action == 'edit'){
        let textId = event.target.parentElement.dataset.textid;
        editText(textId);
        return;
    }
}

//opening edit text page
function editText(id){
    window.location.href = "editText.php?id=" + id;
}

//deleting the chosen text li
function deleteText(id){
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        let liToDelete = document.querySelector(`[data-textid= "${id}"]`);
        let parent = liToDelete.parentElement;
        parent.removeChild(liToDelete);
    }
    ajax.open("GET", "backend/deleteText.php?id=" + id);
    ajax.send();
}