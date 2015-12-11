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
