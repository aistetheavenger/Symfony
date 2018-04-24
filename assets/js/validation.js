const axios = require('axios');

let name = document.getElementById('name');
let team = document.getElementById('team');


const validate = function () {
    let id = this.id;
    let validationResult;

    if(id === "name") {
        validationResult = document.getElementById('nameValidator');
    }
    else if (id === "team") {
        validationResult = document.getElementById('teamValidator');
    }
    validationResult.innerText = '...';
    axios.post(validationResult.dataset.path, {input: this.value})
        .then(function(response) {
            if (response.data.valid) {
                validationResult.innerText = ":)";
            } else {
                validationResult.innerText = ":(";
            }
        })
        .catch(function (error) {
            validationResult.innerText = 'Error: ' + error;
        });
};

name.onkeyup = validate;
name.onchange = validate;

team.onkeyup = validate;
team.onchange = validate;