


function startButtonClick(btn) {
    var occuredAnError = false;
    var radio = getCheckedRadioButton();
    if (areEmailsOther())
    {
        console.log(areEmailsOther());

        if (radio.className)
        {
            var s = getListOfChildern(document.getElementById(radio.id+getIndent()));
            var newArray = [];
            s.forEach(function (t) {
                if (t.tagName === 'INPUT')
                newArray.push(t);
            });
            console.log(newArray);
            newArray.forEach(function (t2) {
                if (!isEmailValid(t2.value))
                {
                    occuredAnError = true;
                    displayError('At least one E-Mail is invalid');
                }
            });
        }

        if (!occuredAnError)
        {
            displayStart();
            changeState(getListOfButtons(), true);
            btn.disabled = true;
            var swag = getAllChildern(document.getElementById(getDivId()));
            console.log(swag);
            changeState(swag, false);
        }
    }
    else
    {
        displayDifferent();
    }
}


