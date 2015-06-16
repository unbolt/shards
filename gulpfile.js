var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass(['shards.scss'], "public/css/shards.css");
    mix.version("css/shards.css");
});
