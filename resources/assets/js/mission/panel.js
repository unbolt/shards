/*
    Handles most mission related tasks on the client side

    - Shows a list of missions available
    - Alternatively, shows the current mission the character is on, and time remaining

    - Allows user to send character on a mission
*/

$(function() {

    // If the missions dashboard panel is on the page
    if($('.dashboard-missions').length > 0) {

        // Check with the server if this user is on a mission or not
        $.get( "/character/mission/status", function( data ) {
            if(data.mission_active === true) {
                // Mission is active, so we need to grab the mission data and display it

                // Grab the current mission data!

                $.get( "/character/mission/details", function ( data ) {
                    // Show the mission information

                    // Format the finish date into a javascript time object
                    var t = data.finish_at.split(/[- :]/);
                    var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);

                    var template = Shards.character.currentmission(data);

                    $('.dashboard-missions').html(template);

                });

                console.log(data.mission_active);
                return true;
            } else {

                // No mission is active, show a mission list for the user to pick from

                console.log(data.mission_active);
                return false;
            }
        });

    }
});
