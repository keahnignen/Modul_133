


// In this file are one liner functions, their name explain them self



/**
 * Parses a List of Button from the Creation to the Controller, that the controller can use the Button directly
 * @param arrayParameter
 * @param unsignedStringParameter
 */
function parseArray(arrayParameter, unsignedStringParameter) {
    buttonArray = arrayParameter;
    unsignedString = unsignedStringParameter;
    buttonList = getListConvertedOfButton(arrayParameter);
}

function getNameOfKI(number) {
    number++;
    return 'KI'+number;
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

function getIdByIndex(index1, index2) {
    var matrix1 = 'x';
    var matrix2 = 'y';
    return matrix1+index1+matrix2+index2;
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

function getListOfChildern(element) {
    var array = element.children;
    var list = [];
    for (var i = 0; i < array.length; i++)
    {
        list.push(array[i]);
    }

    if (list)

        return list;
}

function getAllChildern(element) {
    var list = [];
    createAllChildern(element, list);
    return list;
}

function assignArrayByButton(element, btn) {
    var index = btn.id.replace("x", "").split("y");
    buttonArray[index[0]][index[1]] = element;
}

function checkEmail(textBox) {

    if (textBox === 'x')
    {
        return false;
    }

    var email = textBox.value;


    textBox.className = (isEmailValid(email)) ? 'emailInvalid' : 'emailValid';
    return isEmailValid(email);
}

function isEmailValid(email) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

function itsAKI(player) {
    return (player === getNameOfKI(0) || player === getNameOfKI(1));
}

function createAllChildern(element, arrayList) {
    arrayList.push(element);
    getListOfChildern(element).forEach(function (t) { createAllChildern(t, arrayList); })
}

function changeState(list, enable) {
    list.forEach(function (t) { t.disabled = !enable; })
}

function pressRandomButton() {

    var pas = true;
    while (pas)
    {
        var x = Math.floor((Math.random() * 3) );
        console.log(x);
        var y = Math.floor((Math.random() * 3) );
        if (getButtonArray()[x][y] === getUnsigendString()){
            pas = false;
        }
    }
    buttonClick(getButtonByIndex(x,y))
}

function displayWinnerAndDisableButton(winner) {
    displayWinner(winner);
    changeState(buttonList, false);
}

function getTexboxId() {
    return textBoxId;
}

function getIndent() {
    return 'indent';
}

function isItAHumanVersusKi() {
    return checkIFArrayContent(versusKIArray, getCheckedRadioButton().id);
}

function isItKiVersusKi() {
    return checkIFArrayContent(battleKIArray, getCheckedRadioButton().id);
}

function needsValidation() {
    return checkIFArrayContent(needsVaildationArray, getCheckedRadioButton().id)
}

function getPlayerNameByIndex(index) {
    return textBoxId[index];
}

function getTextboxes() {
    return textBoxArray;
}

function getRadioButtons() {
    return radioButtonArray;
}

function getLabel() {
    return label;
}

function getDivId() {
    return 'divID'
}

function getSectionId() {
    return 'SectionID'
}
function checkIFArrayContent(list, isEqual) {
    var returnValue = false;
    list.forEach(function (t) {
        if (t === isEqual)
        {
            returnValue = true;
        }
    });
    return returnValue;
}

function createLabel() {
    var lblId = 'lbl';
    var lbl = document.createElement('P');
    lbl.id = lblId;
    document.body.appendChild(lbl);
    label = lbl;
}

function getRadioButtonClassTextbox() {
    return 'hasTextboxes';
}

function getCheckedRadioButton() {
    var x;
    getRadioButtons().forEach(function (t) {
        if (t.checked) {
            x = t;
        }
    });
    return x;
}


//View
function changeColor(button, className) {

    //player in orange
    var glyph = 'glyphicon glyphicon-ok ';

    //Player in blue
    if (className === getPlayerNameByIndex(1))
    {
        glyph = 'glyphicon glyphicon-remove ';
    }


    //for indetify the color of the ki (i know its ugly)
    if (itsAKI(className))
    {
        glyph = '\tglyphicon glyphicon-user ';
    }


    button.className += " " + glyph + className + "Color";
    button.disabled = true;
}

function displayWinner(player) {
    if (itsAKI(player))
    {
        sendMessage(player+' won!')
    }
    else
    {
        sendMessage(document.getElementById(player).value + " won!");
    }
}

function displayDraw() {
    sendMessage('Draw');
}

function displayError(errorMessage) {
    sendMessage(errorMessage);
}

function sendMessage(message) {
    getLabel().textContent = message;
}

function addClass(btn, s) {
    btn.className += s;
}

function changeClass(element, s) {
    element.className = s;
}

function displayDifferent() {
    getLabel().textContent = 'E-Mail are similar';
}

function displayStart() {
    getLabel().textContent = 'Game has startet';
}

