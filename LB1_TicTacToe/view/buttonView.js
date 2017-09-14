
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
