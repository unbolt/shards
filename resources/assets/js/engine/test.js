var game = new Phaser.Game(800, 600, Phaser.CANVAS, 'phaser-example', { preload: preload, create: create, update: update, render: render });

function preload() {

    game.load.tilemap('map', 'assets/tilemaps/csv/catastrophi_level2.csv', null, Phaser.Tilemap.CSV);
    game.load.image('tiles', 'assets/tilemaps/tiles/catastrophi_tiles_16.png');
    game.load.spritesheet('player', 'assets/sprites/spaceman.png', 16, 16);

}

var map;
var layer;
var cursors;
var player;

/* UTILITY FUNCTIONS */
/*
function updatePlayer(actor) {
    // Updates the current player
    character.id = actor.id;
    character.x = actor.x;
    character.y = actor.y;
}

function sendPlayerLocation() {

    if(typeof(player) !== 'undefined') {

        var characterMoved = false;

        if(player.x !== character.x) {
            characterMoved = true;
            console.log('Character moved on X axis');
        }

        if(player.y !== character.y) {
            characterMoved = true;
            console.log('Character moved on Y axis');
        }

        if(characterMoved == true) {
            console.log('Player has moved!');
            // Send message to server that the character has moved
            var sendPlayer = '{"id": '+character.id+', "x":'+player.x+', "y": '+player.y+'}';
            console.log(sendPlayer);
            conn.send(sendPlayer);
            characterMoved = false;
        }
    }

    // We need to run this once every couple of seconds
    setTimeout(sendPlayerLocation, 2000);
}

sendPlayerLocation();

function updatePlayerCharacter(actor) {

    // Check if the PC exists already
    if(typeof(playerCharacters[actor.id]) !== 'undefined') {
        // We already have this PC in the array, update it
        playerCharacters[actor.id].x = actor.x;
        playerCharacters[actor.id].y = actor.y;
    } else {
        // We need to make this PC in the array
        playerCharacter = new Object();
        playerCharacter.id = actor.id;
        playerCharacter.x = actor.x;
        playerCharacter.y = actor.y;

        playerCharacters[playerCharacter.id] = playerCharacter;
    }
}
/*
// Create our connection to the movement server
console.log('Initializing Movement...');

var conn = new WebSocket('ws://'+window.location.hostname+':9091');

conn.onopen = function(e) {
    console.log('Movement Server Connection Established!');
};

conn.onmessage = function(e) {
    console.log(e);
    // We are returning a json array, need to parse it properly
    // doing this before passing it off to handlers
    var messageJSON = $.parseJSON(e.data);

    // Check what kind of message we're receiving
    switch(messageJSON.player_type) {
        case 'you':
            updatePlayer(messageJSON);
            break;
        case 'pc':
            updatePlayerCharacter(messageJSON);
            break;
        case 'npc':
            updateNonPlayerCharacter(messageJSON);
            break;
        default:
            console.log('Shits broken, yo.');
            break;
    }
};

*/

function create() {

    //  Because we're loading CSV map data we have to specify the tile size here or we can't render it
    map = game.add.tilemap('map', 16, 16);

    //  Now add in the tileset
    map.addTilesetImage('tiles');

    //  Create our layer
    layer = map.createLayer(0);

    //  Resize the world
    layer.resizeWorld();

    //  This isn't totally accurate, but it'll do for now
    map.setCollisionBetween(54, 83);

    //  Un-comment this on to see the collision tiles
    // layer.debug = true;

    //  Player
    player = new Hero(this);
    player.create(48, 48);

    /*
    player = game.add.sprite(character.x, character.y, 'player', 1);
    player.animations.add('left', [8,9], 10, true);
    player.animations.add('right', [1,2], 10, true);
    player.animations.add('up', [11,12,13], 10, true);
    player.animations.add('down', [4,5,6], 10, true);

    game.physics.enable(player, Phaser.Physics.ARCADE);

    player.body.setSize(10, 14, 2, 1);
    */

    game.camera.follow(player);

    cursors = game.input.keyboard.createCursorKeys();

    var help = game.add.text(16, 16, 'Arrows to move', { font: '14px Arial', fill: '#ffffff' });
    help.fixedToCamera = true;



}

function update() {

    game.physics.arcade.collide(player, layer);

    player.body.velocity.set(0);

    if (cursors.left.isDown)
    {
        player.body.velocity.x = -100;
        player.play('left');
        console.log(player.x);
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

    // Update player locations and start the timer
    // There has to be a better way of doing this
    //sendPlayerLocation();

    // Loop through PC characters and set their locations
    /*
    $.each(playerCharacters, function(i, v) {
        // Check if PC exists already
        if(typeof(pc[v.id]) === 'undefined') {
            pc[v.id] = game.add.sprite(v.x, v.y, 'player', 1);
            pc[v.id].animations.add('left', [8,9], 10, true);
            pc[v.id].animations.add('right', [1,2], 10, true);
            pc[v.id].animations.add('up', [11,12,13], 10, true);
            pc[v.id].animations.add('down', [4,5,6], 10, true);

            game.physics.enable(pc[v.id], Phaser.Physics.ARCADE);

            pc[v.id].body.setSize(10, 14, 2, 1);
        } else {
            pc[v.id].x = v.x;
            pc[v.id].y = v.y;
        }

    });
    */
}

function render() {

    // game.debug.body(player);

}
