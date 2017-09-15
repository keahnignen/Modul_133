var array = [];

getArrayOfNewButtons();

function getArrayOfNewButtons() {

    for(var i = 0; i < 3; i++)
    {
        if (!array[i]) array[i] = [];
        document.write('<div>');
        for(var j = 0; j < 3; j++)
        {
            document.write("<button id=\".{j} .{i}\" type=\"button\" onclick=\"buttonClick(this)\">00</button>");
            array[parseInt(i)][parseInt(j)] = "Free";
        }
        document.write('</div>');
    }

}

parseArray(array);