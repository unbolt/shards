$(function() {
    // Sets up the search boxes for items wherever they may appear
    var armourItems = new Bloodhound({
        datumTokenizer: function (datum) {
            return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/armour/search/%QUERY',
            wildcard: '%QUERY'
        }
    });

    var weaponItems = new Bloodhound({
        datumTokenizer: function (datum) {
            return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/weapon/search/%QUERY',
            wildcard: '%QUERY'
        }
    });

    $('.typeahead') // TODO: Change this to be something more descriptive
        .on('keypress', function(e) {
            return e.which !== 13;
        })
        .typeahead(
            {
                highlight: true
            },
            {
                name: 'armourItems',
                async: true,
                display: 'name',
                source: armourItems,
                templates: {
                    suggestion: Handlebars.compile('<div><img src="'+ EQUIPMENT_ICON_URL + '{{icon}}" /><strong>{{name}}</strong></div>')
                }
            },
            {
                name: 'weaponItems',
                async: true,
                display: 'name',
                source: weaponItems,
                templates: {
                    suggestion: Handlebars.compile('<div><img src="'+ EQUIPMENT_ICON_URL + '{{icon}}" /><strong>{{name}}</strong></div>')
                }
            }
        )
        .bind(
            'typeahead:select',
            function(ev, suggestion) {

                // Clear the typeahead box
                $('.typeahead').typeahead('val', '');

                // Generate a random string
                var random = randomString(5);

                // Once an item is selected then add it to the drops list
                var dropContainer = $('<div>');
                dropContainer.addClass('row');
                dropContainer.addClass('row-'+suggestion.id+'-'+random);

                // Create the template
                var template = Handlebars.compile(`
                    <input type="hidden" name="drops[`+random+`][id]" value="{{id}}" />
                    <input type="hidden" name="drops[`+random+`][type]" value="{{type}}" />
                    <input type="hidden" id="chance-{{type}}-{{id}}-`+random+`" name="drops[`+random+`][chance]" value="0" />
                    <div class="col-md-2">
                        <img src="`+ EQUIPMENT_ICON_URL+`{{icon}}" />
                    </div>
                    <div class="col-md-8 quality-{{quality_id}}">
                        {{name}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-{{id}}-`+random+`"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="drop-rate-{{id}}-`+random+`">0</span>%
                    </div>`);
                // Apply variables to the template
                var drop = template(suggestion);

                // Create a slider object
                var sliderName = 'slider-'+suggestion.type+'-'+suggestion.id+'-'+random;
                var slider = `<input id="`+sliderName+`" data-slider-id="`+sliderName+`" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>`;

                dropContainer.append(drop);

                $('.drop-list').append(dropContainer);

                // Sliderise the slider
                $('.slider-'+suggestion.id+'-'+random).append(slider);
                $('#'+sliderName).slider({
                    tooltip: 'hide',
                    formatter: function(value) {
                        $('.drop-rate-'+suggestion.id+'-'+random).text(value);
                        $('#chance-'+suggestion.type+'-'+suggestion.id+'-'+random).val(value);
                    }
                });
            }
        );


});
