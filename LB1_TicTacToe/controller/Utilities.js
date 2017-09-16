function clickIsInvalid() {
    return false;
}


function checkEmail(textBox)
{
    var p = (isEmailValid(textBox.textContent)) ? 'emailValid' : 'emailInvalid';
    addClass(textBox,  p);
}

function isEmailValid(email)
{
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

