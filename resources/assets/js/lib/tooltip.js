/*
    Tooltip.js

    - Creates tooltips


*/

function createTooltip(data) {
    // Generates the tooltip code itself
    console.log('Generating tooltip...');

    // Tooltip container
    var ttContainer = $('<div>');
    ttContainer.addClass('shards-tooltip');

    // Add the icon
    if(data.icon.length > 0) {
        var ttIcon = $('<img>');
        ttIcon.attr('src', EQUIPMENT_ICON_URL + data.icon);
        ttIcon.addClass('icon');

        ttContainer.append(ttIcon);
    }

    // Add the item name
    if(data.name.length > 0) {
        var ttName = $('<div>');
        ttName.addClass('name');
        ttName.addClass('quality-'+data.quality_id);
        ttName.text(data.name);

        ttContainer.append(ttName);
    }

    // Add defense
    if(data.defense.length > 0) {
        var ttDefense = $('<div>');
        ttDefense.addClass('defense');
        ttDefense.text(data.defense);

        ttContainer.append(ttDefense);
    }




    console.log(ttContainer);

    return ttContainer;
}

function attachTooltip(tooltip) {
    // Attaches a tooltip to a particular thing, like an <a> tag
}
