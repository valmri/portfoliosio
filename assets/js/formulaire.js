// Ajout de zones de saisies dans un formulaire
function addInput(id) {

    let inputs = document.getElementById(id);

    if(id == 'inputsLiens') {

        let groupe = document.createElement('div','lien');
        let inputIntitule = document.createElement('input');
        inputIntitule.setAttribute('type', 'text');
        inputIntitule.setAttribute('name', "liensProjet[]['intitule']");
        inputIntitule.setAttribute('placeholder', "Intitulé de l'adresse url");

        let inputUrl = document.createElement('input');
        inputUrl.setAttribute('type', 'text');
        inputUrl.setAttribute('name', "liensProjet[]['url']");
        inputUrl.setAttribute('placeholder', "Adresse url");

        groupe.appendChild(inputIntitule);
        groupe.appendChild(inputUrl);

        inputs.appendChild(groupe);


    } else {

        let input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', "technoProjet[]");
        input.setAttribute('placeholder', "Nom de la technologie");

        inputs.appendChild(input);

    }

}