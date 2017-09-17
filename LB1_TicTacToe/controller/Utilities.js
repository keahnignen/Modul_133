function clickIsInvalid() {
    return false;
}


function checkEmail(textBox)
{
    textBox.className = (isEmailValid(textBox.value)) ? 'emailInvalid' : 'emailValid';
    return isEmailValid(textBox.value);
}

function isEmailValid(email)
{
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

