
loadScript("controller\\ControllerUtilities.js");
loadScript("controller\\StartButtonController.js");
loadScript('controller\\TicTacToeController.js');
loadScript("controller\\TicTacToeButtonController.js");




loadScript("view\\CreateInputElements.js");

function loadScript(path) {
    var script = document.createElement("script");
    script.src = path;
    document.body.appendChild(script);
}

function onloadEvent() {
    createTicTacToeButtonsAndParseThem();
    createAll();
}

window.onload = onloadEvent;