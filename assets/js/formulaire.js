// Ajout de zones de saisies dans un formulaire
function addInput(id) {

    let inputs = document.getElementById(id);

    if(id == 'inputsLiens') {

        let groupe = document.createElement('div','lien');
        let inputIntitule = document.createElement('input');
        inputIntitule.setAttribute('type', 'text');
        inputIntitule.setAttribute('name', "liensProjet[]['intitule']");
        inputIntitule.setAttribute('placeholder', "Intitulé de l'adresse url");
        inputIntitule.setAttribute('class', "inputSpe");

        let inputUrl = document.createElement('input');
        inputUrl.setAttribute('type', 'text');
        inputUrl.setAttribute('name', "liensProjet[]['url']");
        inputUrl.setAttribute('placeholder', "Adresse url");
        inputUrl.setAttribute('class', "inputSpe");

        let br = document.createElement('br');

        groupe.appendChild(inputIntitule);
        groupe.appendChild(inputUrl);
        groupe.appendChild(br);

        inputs.appendChild(groupe);


    } else {

        let input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', "technoProjet[]");
        input.setAttribute('placeholder', "Nom de la technologie");
        input.setAttribute('class', "inputSpe");

        let br = document.createElement('br');

        inputs.appendChild(input);
        inputs.appendChild(br);

    }

}