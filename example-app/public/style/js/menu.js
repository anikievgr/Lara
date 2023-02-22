
var submenu = document.querySelectorAll('.submenu');
var liActive = document.querySelectorAll('.active');



// submenu.forEach((element) => {
//     element.forEach((element) => {
//         console.log(element)
//     });
//
//
//
//     // console.log(element.children)
//
// });
function navbar(){


let li;
let a;
let ul;
let check = 0;


submenu.forEach((element) => {
        li = element.querySelector('.active');
    console.log(li);
        if (li != null){

                ul = li.closest('.submenu');
                ul.classList.add('show');
                ul = ul.closest('.menu');

                ul = ul.querySelector('a');
                ul.setAttribute('aria-expanded', 'true');

        }else{
            check++

        }

});
if (check >= 3){
    li = document.querySelector('li.active');
    console.log(li);
    a = li.querySelector('a');
    a.setAttribute('aria-expanded', 'true');

}
}
navbar();
// console.log(submenu);
// console.log(submenu[3].children);
