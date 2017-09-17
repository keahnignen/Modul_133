function startButtonClick() {
    var occuredAnError = false;
    getRadiobuttons().forEach(function (t) {
        if (t.checked)
        {
            if (t.hasChildNodes())
            {
               var array  = Array.prototype.slice.call(t.childNodes);
                array.forEach(function (t2) {
                    if (!checkEmail(t2))
                    {

                        displayError('At least one E-Mail is invalid');
                    }
                })
            }
        }
    });
    if (!occuredAnError)
    {
        changeState(getListofButtons(), false);
    }
}