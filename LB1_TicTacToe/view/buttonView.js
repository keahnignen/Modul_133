
function changeColor(button, className) {
    button.className += className + "Color";
    button.disabled = true;
}

function someoneWon(player)
{
    document.getElementById("winner").textContent = document.getElementById(player) + " won!";
}

function noBodyWon()
{
    document.getElementById("winner").textContent = "Draw";
}

function addClass(btn, s) {
    btn.className = s;
}

function changeButtonState(b) {

}

function getButtons() {
    var array = [];
    for(var i = 0; i < 3; i++)
    {
        for(var j = 0; j < 3; j++)
        {

        }
    }
}