
function changeColor(button, className) {
    button.className += className + "Color";
    button.disabled = true;
}

function someoneWon(player)
{
    document.getElementById("winner").textContent = player + " won!";
}

function noBodyWon()
{
    document.getElementById("winner").textContent = "Draw";
}