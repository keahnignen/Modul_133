var textBoxArray = [];
var radioButtonArray = [];

function getTextboxes() {
    return textBoxArray;
}

function getRadiobuttons() {
    return radioButtonArray;
}

function createAll() {
    var div = document.createElement('DIV');
    createRadioButtons(div);
    document.body.appendChild(div);
    createButtons();


}

function createRadioButtons(parent) {

    var radioButtonId = ['pvp', 'pvk', 'kvk'];
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

        var label = document.createElement('LABEL');
        label.for = radioButtonId[i];
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

function createTextboxes(parent, startPoint, max) {

    var indent = document.createElement('DIV');
    indent.className = 'indent';
    parent.appendChild(indent);

    var textBoxId = ['emailOne', 'emailTwo', 'emailThree'];
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
            button.onclick = function () { startButtonClick() };
        }

        section.appendChild(button);
    }
}