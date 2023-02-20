
var submenu = document.querySelectorAll('.submenu');
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
let li;
let ul;
submenu.forEach((element) => {
        li = element.querySelector('.active');
        if (li != null){
                ul = li.closest('.submenu')
                ul.classList.add('show');
                ul = ul.closest('.menu')
                ul = ul.querySelector('a');
                ul.setAttribute('aria-expanded', 'true');
            console.log(ul);
        }

});
for (var key in submenu) {
     li = submenu.children;


}
// console.log(submenu);
// console.log(submenu[3].children);
