/*const menu = "coucou"; est une costante non modifiale utilser let pour
let menu = "coucou"
menu = "hello"
console.log(menu)*/

const menu = document.querySelector('.menu');
const menuToggle = document.querySelector('.menu-toggle');


document.addEventListener('click', () => {
    menu.classlist.toggle('active')
})
