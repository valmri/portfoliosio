// Récupération du bloc des inputs
let inputs = document.getElementById('boiteInputs');

function addInput() {

    let input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'technoProjet[]');

    inputs.appendChild(input);

}

function delInput() {



}