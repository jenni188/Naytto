document.forms['newText'].addEventListener('submit', newText);

function newText(event){
    event.preventDefault();

    const heading = document.forms['newText']['heading'].value;
    const text = document.forms['newText']['text'].value;

    if(heading.length <= 0 || text.length <= 0 ){
        showMessage('error', 'heading and text must be filled!')
    }

    let postData = `heading=${heading}&text=${text}`;
    console.log(postData);

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('success')){
            window.location.href = "aboutAdmin.php?type=success&msg=New text inserted"
        } else{
            showMessage('error',data.error);
        }
    }

    ajax.open("POST" , "backend/createNewText.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(postData);

}