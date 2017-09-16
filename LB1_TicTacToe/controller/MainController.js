
loadScript('controller\\TicTacToeController.js');
loadScript("controller\\TicTacToeButtonController.js");

function loadScript(path) {
    var script = document.createElement("script");
    script.src = path;
    document.body.appendChild(script);
}


function onloadEvent() {
    getArrayOfNewButtons();
}

window.onload = onloadEvent;