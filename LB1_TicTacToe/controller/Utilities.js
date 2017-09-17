function clickIsInvalid() {
    return false;
}


function checkEmail(textBox)
{
    var email = textBox.value;
    if (email)
    {
        return false;
    }
    textBox.className = (isEmailValid(email)) ? 'emailInvalid' : 'emailValid';
    return isEmailValid(email);
}

function isEmailValid(email)
{
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

