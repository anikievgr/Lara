

var mail = document.querySelector('#mainButtonmenuPost');
var price = document.querySelector('#mainButtonmenuPrice');
var order = document.querySelector('#mainButtonmenuOrder');
var mainMenu = document.querySelector('#mainMenu');
var  input = document.querySelector('.mainInput');


switch(input.name) {
    case 'email':  // if (x === 'value1')
        input.setAttribute('placeholder', 'Поиск по почте');
        input.setAttribute('name', 'email');
        mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>'

            break;

    case 'product':  // if (x === 'value2')
        input.setAttribute('placeholder', 'Поиск по заказу');
        input.setAttribute('name', 'product');
        mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'
        break;

    case 'name':  // if (x === 'value2')
        input.setAttribute('placeholder', 'Поиск по имени');
        input.setAttribute('name', 'name');
        mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'
        break;

}
console.log(order);
mainMenu.addEventListener('click', (event) => {
    document.querySelector('.mainMenu').classList.toggle('active');

});
order.addEventListener('click', (event) => {
    document.querySelector('.mainMenu').classList.toggle('active');
    input.setAttribute('placeholder', 'Поиск по заказу');
    input.setAttribute('name', 'product');
    mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'
});
mail.addEventListener('click', (event) => {
    document.querySelector('.mainMenu').classList.toggle('active');
    input.setAttribute('placeholder', 'Поиск по почте');
    input.setAttribute('name', 'email');
    mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>'
});
price.addEventListener('click', (event) => {
    document.querySelector('.mainMenu').classList.toggle('active');
    input.setAttribute('placeholder', 'Поиск по имени');
    input.setAttribute('name', 'name');
    mainMenu.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>'
});
