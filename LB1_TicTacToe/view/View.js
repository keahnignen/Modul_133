





function changeColor(button, className) {

    //player in orange
    var glyph = 'glyphicon glyphicon-ok ';

    //Player in blue
    if (className === getPlayer(1))
    {
        glyph = 'glyphicon glyphicon-remove ';
    }


    //for indetify the color of the ki (i know its ugly)
    if (itsAKI(className))
    {
        glyph = '\tglyphicon glyphicon-user ';
    }


    button.className += " " + glyph + className + "Color";
    button.disabled = true;
}

function displayWinner(player)
{
    if (itsAKI(player))
    {
        sendMessage(player+' won!')
    }
    else
    {
        sendMessage(document.getElementById(player).value + " won!");
    }
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