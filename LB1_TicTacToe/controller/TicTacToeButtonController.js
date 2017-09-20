var matrix1 = 'x';
var matrix2 = 'y';

function getIdByIndex(index1, index2) {
    return matrix1+index1+matrix2+index2;
}

function assignArrayByButton(element, btn) {
    var index = btn.id.replace("x", "").split("y");
    buttonArray[index[0]][index[1]] = element;
}

function getListConvertedOfButton(array) {
    var list = [];
    array.forEach(function (t, number1) {
        t.forEach(function (t2, number2) {
            list.push(document.getElementById(getIdByIndex(number1, number2)));
        })
    });
    return list;
}

function getButtonByIndex(index1, index2) {
    return document.getElementById(getIdByIndex(index1, index2));
}