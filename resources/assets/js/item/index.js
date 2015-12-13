$(function() {
    // Loop through an item icons and add in their image
    $('.item-icon').each(function() {
        var icon = $('<img>');

        icon.attr('src', EQUIPMENT_ICON_URL + $(this).attr('data-icon'));
        icon.addClass('item-icon');

        $(this).append(icon);

    });

    $('.item-slot').each(function() {
        $(this).append(SLOT_NAME[$(this).attr('data-slot-id')]);
    });
});
