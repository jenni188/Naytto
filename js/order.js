let productCount = 1;

document.getElementById('deleteProduct').addEventListener('click', deleteProduct);
document.getElementById('addProduct').addEventListener('click', addProduct);
document.getElementById('sendOrder').addEventListener('submit', sendOrder);


const fname = document.forms['orderForm']['fname'].value;
const lname = document.forms['orderForm']['lname'].value;
const pnumber = document.forms['orderForm']['pnumber'].value;
const email = document.forms['orderForm']['email'].value;

const products = [];
const amount = [];

