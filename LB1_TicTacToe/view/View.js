
function changeColor(button, className) {
    button.className += " " + className + "Color";
    button.disabled = true;
}

/**
 *
 * @param {string} player
 */
function displayWinner(player)
{
    document.getElementById("winner").textContent = document.getElementById(player) + " won!";
}

function displayDraw()
{
    document.getElementById("winner").textContent = "Draw";
}


function addClass(btn, s) {
    btn.className += s;
}
