
loadScript("controller\\ControllerUtilities.js");
loadScript("controller\\CreateHtmlElements.js");
loadScript("controller\\StartButtonController.js");
loadScript("controller\\TicTacToeController.js");


function loadScript(path) {
    var script = document.createElement("script");
    script.src = path;
    document.body.appendChild(script);
}

function initalizeGame() {

    //kill tictactoe
    var ticTacToe = document.getElementById("TicTacToe");
    while (ticTacToe.firstChild) {
        ticTacToe.removeChild(ticTacToe.firstChild);
    }
    createTicTacToeButtonsAndParseThem();
    createAll();
}

window.onload = initalizeGame;