document.forms['login'].addEventListener('submit', loginUser);

function loginUser(event){
    event.preventDefault();

    const username = document.forms['login']['username'].value;
    const pwd = document.forms['login']['pwd'].value;

    if (username.length <= 0){
        showMessage('error','Username is required!');
        return;
    }

    if (pwd.length <= 2){
        showMessage('error','Password minimum lenght is 6 characters!');
        return;
    }
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        
        if (data.hasOwnProperty('success')){
            window.location.href = "homeAdmin.php?type=success&msg=Wellcome!";
            return;
        } else{
            showMessage('error', 'Login failed!');
    }
    }
    ajax.open("POST" , "backend/loginUser.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(`username=${username}&pwd=${pwd}`);
}