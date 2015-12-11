$(function() {
    /*
        CHARACTER CREATION

        - Fetches race and job details
        - Displays starting stats based on the above
    */

    var raceFields = [
        '#race-name',
        '#race-description',
    ];

    var jobFields = [
        '#job-name',
        '#job-description',
    ];

    // Add the attributes to the arrays, and add the rows to the table
    $.each(CHARACTER_ATTRIBUTES, function(i,v) {
        raceFields.push('#race-'+v);
        jobFields.push('#job-'+v);
        raceFields.push('#total-'+v);
        jobFields.push('#total-'+v);

        // Create a row for us to add things to
        var attrRow = $('<tr>');

        // Cell for attribute name
        var nameCell = $('<td>');
        nameCell.addClass('text-right');
        nameCell.text(v);
        // Add name cell to row
        attrRow.append(nameCell);

        // Cell for race attribute
        var raceAttrCell = $('<td>');
        raceAttrCell.attr('id', 'race-'+v);
        raceAttrCell.addClass('text-center');
        // Add race attribute cell to row
        attrRow.append(raceAttrCell);

        // Cell for job attribute
        var jobAttrCell = $('<td>');
        jobAttrCell.attr('id', 'job-'+v);
        jobAttrCell.addClass('text-center');
        // Add job attribute cell to row
        attrRow.append(jobAttrCell);

        // Cell for attribute totals
        var totalAttrCell = $('<td>');
        totalAttrCell.attr('id', 'total-'+v);
        // Add attribute total cell to row
        attrRow.append(totalAttrCell);

        // Add the row to the tbody
        $('#attribute-table tbody').append(attrRow);

    });

    function calculateTotalAttributes() {
        $.each(CHARACTER_ATTRIBUTES, function(i,v) {

            var attr_total = 0;

            var attr_job = parseInt($('#job-'+v).text());

            var attr_race = parseInt($('#race-'+v).text());

            if($.isNumeric(attr_job) && $.isNumeric(attr_race)) {
                attr_total = attr_job + attr_race;
            } else {
                attr_total = '';
            }


            $('#total-'+v).text(attr_total);
        });
    }

    $('#race').change(function() {

        // Reset our fields
        clearFields(raceFields);

        // If we've selected an active race then fetch the race details via ajax
        var raceSelected = $('#race').val();

        if($.isNumeric(raceSelected)) {
            // We have a race ID
            // Fetch race details from the server
            $.ajax({
                url: ENDPOINT_RACE + raceSelected,
            })
             .done(function(data) {
                // We have some data back, update what needs updating
                $('#race-name').text(data.name);
                $('#race-description').text(data.description);
                $('#race-agility').text(data.agility);
                $('#race-dexterity').text(data.dexterity);
                $('#race-strength').text(data.strength);
                $('#race-mind').text(data.mind);
                $('#race-intelligence').text(data.intelligence);
                $('#race-charisma').text(data.charisma);

                // Call function to recalculate the stats
                calculateTotalAttributes();
             });
        }
    });

    $('#job').change(function() {

            // Reset fields
            clearFields(jobFields);

            // If we have an active job selected then get details
            var jobSelected = $('#job').val();

            if($.isNumeric(jobSelected)) {
                // We have a job ID
                // Fetch teh details
                $.ajax({
                    url: ENDPOINT_JOB + jobSelected,
                })
                 .done(function(data) {
                     // We have some data back, update what needs updating
                     $('#job-name').text(data.name);
                     $('#job-description').text(data.description);
                     $('#job-agility').text(data.agility);
                     $('#job-dexterity').text(data.dexterity);
                     $('#job-strength').text(data.strength);
                     $('#job-mind').text(data.mind);
                     $('#job-intelligence').text(data.intelligence);
                     $('#job-charisma').text(data.charisma);

                     // Call function to recalculate the stats
                     calculateTotalAttributes();
                 });
            }
    });
});
