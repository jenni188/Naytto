document.forms['p-form'].addEventListener('submit', createNewP);

function createNewP(event){
    event.preventDefault();

    const formElement = document.querySelector("form");
    const formData = new FormData(formElement);
    formData.append('uploadimage', productimage.files[0])

    const name = document.forms['p-form']['p-name'].value;
    const price = document.forms['p-form']['p-price'].value;
    const code = document.forms['p-form']['p-code'].value;
    const category = document.forms['p-form']['p-category'].value;
    // const img = document.forms['p-form']['p-img'].value;

    if (name.length <= 0 || code.length <= 0 || category.length <= 0|| price.length <= 0){
        showMessage('error', 'Name, code, price and category must be set!');
        return;
    }

    // let postData = `name=${name}&price=${price}&code=${code}&category=${category}&img=${img}`;
    // let postData = `name=${name}&price=${price}&code=${code}&category=${category}`;
    // postData.append("file", productimage.files[0]);

    console.log(formData);
    
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
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
}