var playerOnesTurn = true;
var playerOne = 'playerOne';
var playerTwo = 'playerTwo';
var activePlayer;
var buttonArray =  [];
var buttonList = [];
var unsignedString;
var round = 0;
var roundKI = false;



function getNameOfKI(number)
{
    number++;
    return 'KI'+number;
}

function parseArray(arrayParameter, unsignedStringParameter) {
    buttonArray = arrayParameter;
    unsignedString = unsignedStringParameter;
    buttonList = getListConvertedOfButton(arrayParameter);
}

function getUnsigendString() {
    return unsignedString;
}

function getListOfButtons() {
    return buttonList;
}


function getButtonArray() {
    return buttonArray;
}

/**
 *
 * @param button
 * @param versusKI {boolean}
 */

function buttonClick(button) {


    round++;
    if (versusKI())
    {
        playerOne = getPlayer(2);
        playerTwo = getNameOfKI(0);
    }
    else if (battleKI()) {
        playerOne = getNameOfKI(0);
        playerTwo = getNameOfKI(1);
    } else {
        playerOne = getPlayer(0);
        playerTwo = getPlayer(1)
    }

    activePlayer = (playerOnesTurn) ? playerOne : playerTwo;
    assignArrayByButton(activePlayer, button);
    changeColor(button, activePlayer);
    checkIfSomeWon();
    playerOnesTurn = !playerOnesTurn;

    roundKI = !roundKI;
    //Nur Ki vs Mensch
    if (versusKI())
    {

        if (roundKI)
        {
            pressRandomButton();
        }
    }
}



function checkIfSomeWon()
{
    if (round < 5) return;

    for (var x = 0; x <= 2; x++)
    {
        if (buttonArray[x][0] !== unsignedString)
        {
            if (buttonArray[x][0] === buttonArray[x][1] && buttonArray[x][1] === buttonArray[x][2])
            {
                displayWinnerAndDisableButton(buttonArray[x][0]);
                return;
            }
        }
    }

    for (var y = 0; y <= 2; y++)
    {
        if (buttonArray[0][y] !== unsignedString)
        {
            if (buttonArray[0][y] === buttonArray[1][y] && buttonArray[1][y] === buttonArray[2][y])
            {
                displayWinnerAndDisableButton(buttonArray[0][y]);
                return;
            }
        }
    }

    if (buttonArray[1][1] !== unsignedString)
    {
        if (buttonArray[0][0] === buttonArray[1][1] && buttonArray[1][1] === buttonArray[2][2])
        {
            displayWinnerAndDisableButton(buttonArray[1][1]);
            return;
        }

        if (buttonArray[0][2] === buttonArray[1][1] && buttonArray[1][1] === buttonArray[2][0])
        {
            displayWinnerAndDisableButton(buttonArray[1][1]);
            return;
        }
    }


    if (round > 8) {
        displayDraw();
        changeState(buttonList, false);
    }
}


function displayWinnerAndDisableButton(winner) {
    displayWinner(winner);
    changeState(buttonList, false);
}

