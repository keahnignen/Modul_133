
var playerOnesTurn = true;
var playerOne = 'playerOne';
var playerTwo = 'playerTwo';
var activePlayer;
var buttonArray =  [];
var unsignedString;
var round = 0;


function parseArray(arrayParameter, unsignedStringParameter) {
    buttonArray = arrayParameter;
    unsignedString = unsignedStringParameter;
}

function buttonClick(button) {
    if (clickIsInvalid()) return;
    round++;
    activePlayer = (playerOnesTurn) ? playerOne : playerTwo;
    var index = button.id.split("y");
    buttonArray[index[0]][index[1]] = activePlayer;
    changeColor(button, activePlayer);
    checkIfSomeWon();
    playerOnesTurn = !playerOnesTurn;
}


function asignArrayByButton(btn, string) {
    var index = btn.id.split("y");
    buttonArray[index[0]][index[1]] = string;
}

/*
This is Code became replaced with getElementById(index1, index2)
function getElementById(index) {
    var id = index.split("][").forEach(function (t) { t.replace("[", "").replace("]", ""); });
    return document.getElementById(id[0]+"y"+id[1]);
}
*/

function getElementById(index1, index2) {
    return document.getElementById(index1+"y"+index2);
}

function getListOfButton(array) {
    var list = [];
    array.forEach(function (t, number1) {
        t.forEach(function (t2, number2) {
            list.push(getElementById(number1, number2));
        })
    });
    return list;
}

function checkIfSomeWon()
{
    console.log(round);
    if (round < 5) return;

    for (var x = 0; x <= 2; x++)
    {
        if (buttonArray[x][0] !== unsignedString)
        {
            if (buttonArray[x][0] === buttonArray[x][1] && buttonArray[x][1] === buttonArray[x][2])
            {
                displayWinner(buttonArray[x][0]);
            }
        }
    }

    for (var y = 0; y <= 2; y++)
    {
        if (buttonArray[0][y] !== unsignedString)
        {
            if (buttonArray[0][y] === buttonArray[1][y] && buttonArray[1][y] === buttonArray[2][y])
            {
                displayWinner(buttonArray[0][y]);
            }
        }
    }

    if (buttonArray[1][1] !== unsignedString)
    {
        if (buttonArray[0][0] === buttonArray[1][1] && buttonArray[1][1] === buttonArray[2][2])
        {
            displayWinner(buttonArray[1][1]);
        }

        if (buttonArray[0][2] === buttonArray[1][1] && buttonArray[1][1] === buttonArray[2][0])
        {
            displayWinner(buttonArray[1][1]);
        }
    }


    if (round > 8) displayDraw();
}


function clickIsInvalid() {
    return false;
}


function checkEmail(textBox){

    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var p = (regex.test(textBox.textContent)) ? 'emailValid' : 'emailInvalid';
    addClass(textBox,  p);
}


function onloadEvent() {
    alert('swag');
}

//window.onload = onloadEvent ;