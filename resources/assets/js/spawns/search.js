$(function() {
    // Sets up the search boxes for items wherever they may appear
    var spawnItems = new Bloodhound({
        datumTokenizer: function (datum) {
            return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/spawn/search/%QUERY',
            wildcard: '%QUERY'
        }
    });

    $('.typeahead-spawns')
        .on('keypress', function(e) {
            return e.which !== 13;
        })
        .typeahead(
            {
                highlight: true
            },
            {
                name: 'spawnItems',
                async: true,
                display: 'name',
                source: spawnItems,
                templates: {
                    suggestion: Handlebars.compile('<div><strong>{{name}}</strong></div>')
                }
            }
        )
        .bind(
            'typeahead:select',
            function(ev, suggestion) {

                // Clear the typeahead box
                $('.typeahead-spawns').typeahead('val', '');

                // Generate a random string
                var random = randomString(5);

                // Once an item is selected then add it to the drops list
                var dropContainer = $('<div>');
                dropContainer.addClass('row');
                dropContainer.addClass('row-'+suggestion.id+'-'+random);

                // Create the template
                var template = Handlebars.compile(`
                    <input type="hidden" name="spawns[`+random+`][id]" value="{{id}}" />
                    <input type="hidden" id="chance-{{id}}-`+random+`" name="spawns[`+random+`][chance]" value="0" />
                    <div class="col-md-8">
                        {{name}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-{{id}}-`+random+`"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="spawns-rate-{{id}}-`+random+`">0</span>%
                    </div>`);
                // Apply variables to the template
                var drop = template(suggestion);

                // Create a slider object
                var sliderName = 'slider-'+suggestion.type+'-'+suggestion.id+'-'+random;
                var slider = `<input id="`+sliderName+`" data-slider-id="`+sliderName+`" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>`;

                dropContainer.append(drop);

                $('.spawn-list').append(dropContainer);

                // Sliderise the slider
                $('.slider-'+suggestion.id+'-'+random).append(slider);
                $('#'+sliderName).slider({
                    tooltip: 'hide',
                    formatter: function(value) {
                        $('.spawns-rate-'+suggestion.id+'-'+random).text(value);
                        $('#chance-'+suggestion.id+'-'+random).val(value);
                    }
                });
            }
        );


});
