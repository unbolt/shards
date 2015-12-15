/*
    Utility functions
*/

/*
    clearFields
    - Empties a set of fields, can be text fields, divs, etc.
    - Accepts an array or single field
*/
function clearFields(fields) {

    var fieldsArray = new Array();

    if($.isArray(fields) !== true) {
        fieldsArray.push(fields);
    } else {
        fieldsArray = fields;
    }

    $.each( fieldsArray, function( i, v) {
        $(v).empty().val('').prop('checked', false);
    });
}

/*
    Random string
    - Makes a random string
*/
function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
    	var randomPoz = Math.floor(Math.random() * charSet.length);
    	randomString += charSet.substring(randomPoz,randomPoz+1);
    }
    return randomString;
}
