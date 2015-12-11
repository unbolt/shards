/*
    Class that controls all player characters
*/

Hero = function(game) {
    this.game = game;
    this.sprite = null;
}

Hero.prototype.create = function(x, y) {
    this.sprite = this.game.add.sprite(x, y, 'player', 1);
    this.sprite.amimations.add('left', [8,9], 10, true);
    //this.animations.add('right', [1,2], 10, true);
    //this.animations.add('up', [11,12,13], 10, true);
    //this.animations.add('down', [4,5,6], 10, true);

    this.game.physics.enable(this, Phaser.Physics.ARCADE);

    //this.body.setSize(10, 14, 2, 1);
}

Hero.prototype.update = function(enemyGroup) {
    this.sprite.collide(enemyGroup);
}
