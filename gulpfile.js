var elixir = require('laravel-elixir');

elixir(function(mix) {
    // All stylesheets handled by SCSS - run the SCSS and version it
    mix
        .sass(['shards.scss'], 'public/css/shards.css')
    // Merge javascripts
        .scripts(
            [
                // jQuery libraries
                '/lib/plugins/jquery.serializeObject.js',
                '/lib/plugins/jquery.typeahead.bundle.js',
                '/lib/plugins/jquery.bootstrapSlider.js',

                // Global and utility stuff
                'globals.js',               // Global variables
                'lib/utility.js',           // Utility functions used throughout
                'lib/tooltip.js',

                // Useful things
                'chat.js',                  // Chat
                'character/create.js',      // Character creation
                'item/index.js',            // Item listing
                'item/search.js',
                'item/armour/create.js',     // Armour creation
                'spawns/show.js',            // Runs drop testing for spawns page
                'spawns/search.js',
                
                // Mission creation
                'mission/create.js',
            ],

            'public/js/shards.js')
    // Version our outputs
        .version(['css/shards.css', 'js/shards.js'])
});
