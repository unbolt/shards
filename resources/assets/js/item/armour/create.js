$(function() {
    /*
        ARMOUR CREATION

        - Adds a dropdown for selecting item level based on global variable for max item level

        - Formats the icons and sorts out selecting one

        - Creates the input for the attributes

        - Generates the thumbnail on the page

    */

    if($('.armour-creation-container .item-level').length > 0) {
        // Create a dropdown for selecting item level
        var iLvlSelect = $('<select>');

        iLvlSelect.attr('name', 'level');
        iLvlSelect.addClass('form-control');

        iLvlSelect.append('<option>Item Level</option>');

        // Loop through the item levels and add select options to the dropdown
        var i = 1;
        while (i < CHARACTER_LEVEL_MAX + 1) {

            var ddItem = $('<option>');

            ddItem.attr('value', i);
            ddItem.text(i);

            iLvlSelect.append(ddItem);

            delete ddItem;

            i++;
        }

        $('.item-level').append(iLvlSelect);
    }

    // Do all the icon magic
    if($('.armour-creation-container .icon-selection').length > 0) {
        $('.icon-selection div').each(function() {
            var icon = $(this).attr('data-icon');
            var image = $('<img>');

            image.addClass('item-icon');
            image.attr('src', EQUIPMENT_ICON_URL + icon);

            image.click(function() {
                $('input[name=icon]').attr('value', icon);
            });

            $(this).append(image);
        });
    }

    // Add in the boxes for assigning attributes
    if($('.armour-creation-container .stat-selection').length > 0) {

        var statContainer = $('.armour-creation-container .stat-selection');

        $.each(CHARACTER_ATTRIBUTES, function(i,v) {
            var attributeContainer = $('<div>');
            attributeContainer.addClass('col-md-2');

            var attributeLabel = $('<label>');
            attributeLabel.text(v);
            attributeLabel.attr('for', v);

            var attributeInput = $('<input>');
            attributeInput.attr('placeholder', v);
            attributeInput.attr('name', v);
            attributeInput.addClass('form-control');

            attributeContainer.append(attributeLabel);
            attributeContainer.append(attributeInput);

            statContainer.append(attributeContainer);
        });

        statContainer.wrapInner('<div class="row"></div>');
    }

    // Watch the armour creation form for changes
    if($('.armour-creation-container form').length > 0) {
        $('input, select, textarea').change(function() {
            // Call function to generate a thumbnail but pass it the form data (?)
            // TODO
        });
    }

});
