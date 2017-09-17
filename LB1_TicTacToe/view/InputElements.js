var textBoxArray = [];
var radioButtonArray = [];
var label;

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

function createAll() {
    var div = document.createElement('DIV');
    div.id = getDivId();
    createRadioButtons(div);
    document.body.appendChild(div);
    createButtons();
    createLabel();
}

var radioButtonId = ['pvp', 'pvk', 'kvk'];

function createRadioButtons(parent) {


    var labelString = ['Human vs Human', 'Human vs K.I.', 'K.I. vs K.I.'];
    var radioButtonName = 'gameMode';


    for (var i = 0; i < 3; i++)
    {
        var radioButton = document.createElement('INPUT');
        radioButton.type = 'radio';
        radioButton.id = radioButtonId[i];
        radioButton.name = radioButtonName;
        radioButton.value = i;
        radioButtonArray.push(radioButton);
        if (i !== 2)
        {
            radioButton.className = getRadioButtonClassTextbox();
        }

        var label = document.createElement('LABEL');
        label.setAttribute('for', radioButtonId[i]);
        label.textContent = labelString[i];

        var section = document.createElement('SECTION');
        parent.appendChild(section);
        section.appendChild(radioButton);
        section.appendChild(label);

        if (i === 0)
        {
            radioButton.checked = true;
            createTextboxes(section, 0, 2);
        }
        else if (i === 1)
        {
            createTextboxes(section, 2, 3);
        }


    }
}


var textBoxId = ['emailOne', 'emailTwo', 'emailThree'];

function areEmailsOther() {
    for (var x = 0; x < textBoxArray.length-1; x++)
    {
        if (textBoxArray[x].value === textBoxArray[x+1].value)
        {
            return false;
        }
    }
    return true;
}

function getTexboxId() {
    return textBoxId;
}

function getIndent() {
    return 'indent';
}

function createTextboxes(parent, startPoint, max) {

    var indent = document.createElement('DIV');
    indent.className = 'indent';
    var x = radioButtonId[max-2] + getIndent();
    console.log(x);
    indent.id = x; //Pretty Ugly!
    parent.appendChild(indent);
    var textBoxPlaceholder = ['i@am.batman', 'why@so.serious', 'i@like.trains'];

    for (var i = startPoint; i < max; i++)
    {
        var textBox = document.createElement('INPUT');
        textBox.id = textBoxId[i];
        textBox.setAttribute("oninput", "checkEmail(this)");
        textBox.placeholder = textBoxPlaceholder[i];
        textBoxArray.push(textBox);
        indent.appendChild(textBox);

        if (i === 0)
        {
            var br = document.createElement('BR');
            indent.appendChild(br);
        }
    }
}

function createButtons() {
    var section = document.createElement('SECTION');
    document.body.appendChild(section);

    var buttonTextContent = ['Reset', 'Start'];

    for (var i = 0; i < 2; i++)
    {
        var button = document.createElement('BUTTON');
        button.textContent = buttonTextContent[i];
        button.type = 'button';

        if (i === 0)
        {
            button.onclick = function () { location.reload() };
        }

        if (i === 1)
        {
            button.onclick = function () { startButtonClick(this) };
        }

        section.appendChild(button);
    }
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


function getCheckedRadioButton()
{
    var x;
    getRadioButtons().forEach(function (t) {
        if (t.checked) {
            x = t;
        }
    });
    return x;
}