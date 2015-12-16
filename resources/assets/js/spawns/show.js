$(function() {
    /*
        Show spawn JS

        - Runs the drop test and shows results
    */

    if($('.test-drops-button').length > 0) {
        // We have a test drop button, presume everything else is in place...

        $('.test-drops-button').click(function() {
            console.log('Starting drop testing...');

            // Clear the results and drops results divs
            clearFields(['.test-drops', '.test-drops-results']);

            // Disable the button
            $(this).prop('disabled', true);

            var calculateResults = function () {

                clearFields(['.test-drops-results']);

                var stats = $('<table></table>');

                stats.addClass('table');
                stats.attr('width', '100%');

                stats.append(`
                        <thead>
                            <th>Item</th>
                            <th>Drops</th>
                            <th>Percentage</th>
                        </thead>
                    `);

                // Loop through the drops and check how many times they appear in the results table
                $('.drops').each(function() {
                    // Find each item and grab its identifier
                    var item = $(this).find('.item-icon');
                    var itemIdentifier = $(item).attr('data-drop');
                    var itemName = $(item).attr('data-item-name');
                    var itemQuality = $(item).attr('data-item-quality');

                    // Check how many items exist
                    var numDrops = $('.'+itemIdentifier).length;
                    var numKills = $('.kill').length;

                    var dropPercent = ((numDrops/numKills) * 100).toFixed(2);

                    stats.append(`
                        <tr>
                            <td class="quality-`+itemQuality+`">
                                `+itemName+`
                            </td>
                            <td class="text-center">
                                `+numDrops+`/`+numKills+`
                            </td>
                            <td class="text-center">
                                `+dropPercent+`%
                            </td>
                        </tr>
                    `);



                });

                $('.test-drops-results').append(stats);
            }

            // Define the function for running the call and processing it
            var checkLoot = function () {
                // Generate a random string for callback
                var random = randomString(5);
                // Get the spawn ID
                var spawnID = $('.test-drops-button').attr('data-spawn');
                // Do ajax call to get the drops
                $.ajax(
                    ENDPOINT_SPAWN + 'drops/' + spawnID + '?=' + random,
                    {
                        type: 'GET',
                        statusCode: {
                            200: function (response) {
                                // We have drops, loop through them
                                $.each(response, function() {
                                    var drop = $('<div></div>');
                                    drop.addClass('quality-'+this.quality_id);
                                    drop.addClass(this.type+'-'+this.id);
                                    drop.text(this.name);

                                    $('.test-drops').append(drop);

                                });
                            },
                            204: function (response) {
                                $('.test-drops').append('<div>No drops</div>');
                            }
                        },
                        success: function (response) {
                            var kill = $('<div></div>');
                            kill.text('Kill');
                            kill.addClass('kill');
                            $('.test-drops').append(kill);

                            calculateResults();
                        }
                    }
                );

            }

            repeatXI(checkLoot, 10, 1000, true);
            calculateResults();
        });
    }
});
