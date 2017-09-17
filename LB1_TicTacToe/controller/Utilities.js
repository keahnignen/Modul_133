function clickIsInvalid() {
    return false;
}

var unassigned = 'x';

checkEmail(unassigned);

function checkEmail(textBox)
{

    console.log('mucho');

    if (textBox === unassigned)
    {
        return false;
    }

    var email = textBox.value;

    console.log('muchoNachos');

    textBox.className = (isEmailValid(email)) ? 'emailInvalid' : 'emailValid';
    return isEmailValid(email);
}

function isEmailValid(email)
{
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}


function getAllChildern(element)
{
    var list = [];
    createAllChildern(element, list);
    return list;
}

function createAllChildern(element, arrayList) {
    arrayList.push(element);
    getListOfChildern(element).forEach(function (t) { createAllChildern(t, arrayList); })
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
