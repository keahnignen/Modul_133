
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

function sendMessage(message) {
    getLabel().textContent = message;
}

function addClass(btn, s) {
    btn.className += s;
}

function changeClass(element, s) {
    element.className = s;
}

function displayDifferent()
{
    getLabel().textContent = 'E-Mail are similar';
}

function displayStart() {
    getLabel().textContent = 'Game has startet';
}