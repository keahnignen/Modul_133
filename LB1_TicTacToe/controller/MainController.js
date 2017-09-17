
loadScript('controller\\TicTacToeController.js');
loadScript("controller\\TicTacToeButtonController.js");
loadScript("controller\\StartButtonController.js");
loadScript("controller\\Utilities.js");

loadScript("view\\InputElements.js");

function loadScript(path) {
    var script = document.createElement("script");
    script.src = path;
    document.body.appendChild(script);
}


function onloadEvent() {
    getArrayOfNewButtons();
    createAll();
}

window.onload = onloadEvent;