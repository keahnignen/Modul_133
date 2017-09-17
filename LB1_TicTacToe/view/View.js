
function changeColor(button, className) {
    button.className += " " + className + "Color";
    button.disabled = true;
}

function displayWinner(player)
{
    sendMessage(document.getElementById(player) + " won!");
}

function displayDraw()
{
    sendMessage('Draw');
}

function displayError(errorMessage) {
    sendMessage(errorMessage);
}

var labelId = 'lbl';
function sendMessage(message) {
    document.getElementById(labelId).textContent = message;
}

function addClass(btn, s) {
    btn.className += s;
}

function changeClass(element, s) {
    element.className = s;
}
