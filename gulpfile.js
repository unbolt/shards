var elixir = require('laravel-elixir');

require('laravel-elixir-handlebars');

elixir(function(mix) {
    // All stylesheets handled by SCSS - run the SCSS and version it
    mix
        .sass(['shards.scss'], 'public/css/shards.css')
    // Compile all our handlebars templates
        .templates([
            '**/*.hbs'
        ], 'resources/assets/js/templates.js', 'resources/assets/js', 'Shards')
    // Merge javascripts
        .scripts(
            [
                // jQuery libraries
                '/lib/plugins/jquery.serializeObject.js',
                '/lib/plugins/jquery.typeahead.bundle.js',
                '/lib/plugins/jquery.bootstrapSlider.js',
                '/lib/plugins/jquery.countdown.js',

                // Handlebars templates
                'templates.js',

                // Global and utility stuff
                'globals.js',               // Global variables
                'lib/utility.js',           // Utility functions used throughout

                // Tooltips
                'lib/tooltip.js',

                // Useful things
                'item/index.js',            // Item listing
                'item/search.js',
                'item/armour/create.js',     // Armour creation
                'spawns/show.js',            // Runs drop testing for spawns page
                'spawns/search.js',

                // Mission creation
                'mission/create.js',

                // User dashboard panels (where all the good stuff happens)
                'mission/panel.js',

                // Character related JS magic
                'character/create.js',      // Character creation

            ],

            'public/js/shards.js')
    // Version our outputs
        .version(['css/shards.css', 'js/shards.js'])
});
