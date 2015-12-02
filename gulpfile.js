var elixir = require('laravel-elixir');

elixir(function(mix) {
    // All stylesheets handled by SCSS - run the SCSS and version it
    mix
        .sass(['shards.scss'], 'public/css/shards.css')
    // Merge javascripts
        .scripts(['chat.js'], 'public/js/shards.js')
    // Version our outputs
        .version(['css/shards.css', 'js/shards.js'])
});
