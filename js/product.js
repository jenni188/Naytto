document.forms['p-form'].addEventListener('submit', createNewP);

function createNewP(event){
    event.preventDefault();

    // Check ir all fields are set
    const name = document.forms['p-form']['p-name'].value;
    const price = document.forms['p-form']['p-price'].value;
    const code = document.forms['p-form']['p-code'].value;
    const category = document.forms['p-form']['p-category'].value;
    
    if (name.length <= 0 || code.length <= 0 || category.length <= 0|| price.length <= 0){
        showMessage('error', 'Name, code, price and category must be set!');
        return;
    }

    // Create new FormData object
    const formData = new FormData(document.forms['p-form']);
    
    // // Get the uploaded file input element
    // var fileInput = document.forms['p-form'].querySelector('input[type="file"]');
  
    // // Get the File object from the input element
    // var file = fileInput.files[0];
    
    // // Append the File object to the FormData object
    // formData.append('bar', file);
    
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('success')){
            // window.location.href = "index.php?type=success&msg=New product inserted"
        } else{
            showMessage('error',data.error);
        }
    }

    ajax.open("POST" , "backend/createNewProduct.php", true);
    // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
}