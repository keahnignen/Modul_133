

getArrayOfNewButtons();

function getArrayOfNewButtons() {
    var array = [];
    var notAssigned = "NotAssigned";
    for(var i = 0; i < 3; i++)
    {
        if (!array[i]) array[i] = [];
        document.write('<div>');
        for(var j = 0; j < 3; j++)
        {
            document.write("<button id=\"" + j + "y"+ i + "\" type=\"button\" onclick=\"buttonClick(this)\"></button>");
            array[i][j] = notAssigned;
        }
        document.write('</div>');
    }
    changeState(array, true);
    parseArray(array, notAssigned);

}

function changeState(list, b) {
    getListOfButton(list).forEach(function (t) { t.disabled = b; })
}
