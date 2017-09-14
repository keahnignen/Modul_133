
var playerOnesTurn = true;
var playerOne = 'playerOne';
var playerTwo = 'playerTwo';
var activePlayer;
var array = [];

function buttonClick(button) {
    activePlayer = (playerOnesTurn) ? playerOne : playerTwo;
    changeColor(button, activePlayer);
    checkIfSomeWon();
    playerOnesTurn = !playerOnesTurn;
}

function checkIfSomeWon()
{

    for (var x = 0; x <= 2; x++)
    {
        if (array[x][0] == array[x][1] && array[x][1] == array[x][2]) someoneWon(array[x][0]);
    }

    if (array.length == 9)
}



function registerInArray(button) {
    //Lazy initalization (damn javascript)
    var x = parseInt(button.textContent.substr(0, 1));
    var y = parseInt(button.textContent.substr(1, 1));
    if (!array[x]) array[x] = [];
    array[x][y] = activePlayer;
}