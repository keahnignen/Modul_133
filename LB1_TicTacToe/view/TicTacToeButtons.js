function getArrayOfNewButtons() {
    var array = [];
    var notAssigned = "NotAssigned";
    for(var i = 0; i < 3; i++)
    {
        if (!array[i]) array[i] = [];
        var div = document.createElement("DIV");
        for(var j = 0; j < 3; j++)
        {
            var button = document.createElement("BUTTON");
            button.id = getIdByIndex(i, j);
            button.onclick =  function() { buttonClick(this); };
            button.className = "tictactoebutton";
            array[i][j] = notAssigned;
            div.appendChild(button);
        }
        document.getElementById('TicTacToe').appendChild(div);
    }
    parseArray(array, notAssigned);
    changeState(getListOfButtons(), false);

}


function changeState(list, enable) {
   list.forEach(function (t) { t.disabled = !enable; })
}
