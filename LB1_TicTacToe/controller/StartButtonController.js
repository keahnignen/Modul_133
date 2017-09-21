/**
 * this class will used if somone press the start button
 * @param btn {Button}
 */


function startButtonClick(btn) {
    var occuredAnError = false;

    var radio = getCheckedRadioButton();
    //If a there is just one field to check:
    //     than will the first statement be true, and it will continue
    //     if its not the only one than will the second statemnet executed
    //And id both is wrong, there will be  a error showed


    if (!needsValidation() || areEmailsOther())
    {
        //Check if emails are Valid
        if (radio.className)
        {

            var s = getListOfChildern(document.getElementById(radio.id+getIndent()));
            var newArray = [];
            s.forEach(function (t) {
                if (t.tagName === 'INPUT')
                newArray.push(t);
            });
            //console.log(newArray);
            newArray.forEach(function (t2) {
                if (!isEmailValid(t2.value))
                {
                    occuredAnError = true;
                    displayError('At least one E-Mail is invalid');
                }
            });
        }
        //end if, for checking if email is valid

        if (!occuredAnError)
        {
            displayStart();
            changeState(getListOfButtons(), true);
            btn.disabled = true;
            var swag = getAllChildern(document.getElementById(getDivId()));
            //console.log(swag);
            changeState(swag, false);
        }
    }
    else
    {
        displayDifferent();
    }

    if (isItKiVersusKi())
    {
        for (var i = 0; i < 9; i++)
        {
            pressRandomButton();
        }
    }

}


