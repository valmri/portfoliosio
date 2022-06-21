let btnMenu = document.getElementById('menu__resp-bouton');
let menuBody = document.getElementById('menu__resp-body');

btnMenu.addEventListener('click', function(e) {

    if(menuBody.style.display == "block") {
        menuBody.style.display = "none";
    } else {
        menuBody.style.display = "block";
    }

})