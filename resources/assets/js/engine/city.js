var game = new Phaser.Game(800, 600, Phaser.AUTO, 'phaser-example', { preload: preload, update: update, create: create });

function preload() {

    game.load.tilemap('city', 'tilemaps/maps/magecity.json', null, Phaser.Tilemap.TILED_JSON);
    game.load.image('tiles', 'tilemaps/tiles/magecity.png');
    game.load.spritesheet('player', 'sprites/characters/ritual.png', 64, 64);

}

var map;
var layer;
var cursors;
var player;

function create() {

    game.stage.backgroundColor = '#787878';

    map = game.add.tilemap('city', 32, 32);

    //  The first parameter is the tileset name, as specified in the Tiled map editor (and in the tilemap json file)
    //  The second parameter maps this name to the Phaser.Cache key 'tiles'
    map.addTilesetImage('Mage City', 'tiles');

    //  Creates a layer from the World1 layer in the map data.
    //  A Layer is effectively like a Phaser.Sprite, so is added to the display list.
    layer = map.createLayer('Background');

    //  This resizes the game world to match the layer dimensions
    layer.resizeWorld();

    //map.setCollisionBetween(54,83); TODO

    //layer.debug = true;

    player = game.add.sprite(48, 48, 'player', 182);
    player.animations.add('left', [118,119,120,121,122,123,124,125], 10, true);
    player.animations.add('right', [144,145,146,147,148,149,150,151], 10, true);
    player.animations.add('up', [105,106,107,108,109,110,111,112], 10, true);
    player.animations.add('down', [131,132,133,134,135,136,137,138], 10, true);

    game.physics.enable(player, Phaser.Physics.ARCADE);

    player.body.setSize(64, 64, 2, 1);

    game.camera.follow(player);

    cursors = game.input.keyboard.createCursorKeys();

    help.fixedToCamera = true;

}

function update() {
    game.physics.arcade.collide(player, layer);

    player.body.velocity.set(0);

    if (cursors.left.isDown)
    {
        player.body.velocity.x = -100;
        player.play('left');
    }
    else if (cursors.right.isDown)
    {
        player.body.velocity.x = 100;
        player.play('right');
    }
    else if (cursors.up.isDown)
    {
        player.body.velocity.y = -100;
        player.play('up');
    }
    else if (cursors.down.isDown)
    {
        player.body.velocity.y = 100;
        player.play('down');
    }
    else
    {
        player.animations.stop();
    }
}

function render() {
    game.debug.body(player);
}
