var textBoxArray = [];
var radioButtonArray = [];

function createAll() {
    var div = document.createElement('DIV');
    createRadioButtons(div);
    document.body.appendChild(div);
}

function createRadioButtons(parent) {

    var radioButtonId = ['pvp', 'pvk', 'kvk'];
    var radioButtonName = 'gameMode';


    for (var i = 0; i < 3; i++)
    {
        var radioButton = document.createElement('INPUT');
        radioButton.type = 'radio';
        radioButton.id = radioButtonId[i];
        radioButton.name = radioButtonName;
        radioButton.value = i;
        radioButtonArray.push(radioButton);

        if (i == 0)
        {
            radioButton.checked = true;
            createTextboxes(radioButton, 0);
        }
        else if (i == 1)
        {
            createTextboxes(radioButton, 2);
        }

        parent.appendChild(radioButton);
    }
}

function createTextboxes(parent, startPoint) {

    var indent = document.createElement('DIV');
    indent.className = 'indent';
    parent.appendChild(indent);

    var textBoxId = ['emailOne', 'emailTwo', 'emailThree'];
    var textBoxPlaceholder = ['i@am.batman', 'why@so.serious', 'i@like.trains'];

    for (var i = startPoint; i < 3; i++)
    {
        var textBox = document.createElement('INPUT');
        textBox.id = textBoxId[i];
        textBox.placeholder = textBoxPlaceholder[i];
        textBoxArray.push(textBox);
        indent.appendChild(textBox);
    }
}