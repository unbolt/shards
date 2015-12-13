/*
    GLOBAL VARIABLES

    - Endpoints
*/

// Endpoints

var ENDPOINT_RACE = '/race/';
var ENDPOINT_JOB = '/job/';
var ENDPOINT_CHARACTER = '/character/';

// URLs
var BASE_URL = '/';

var EQUIPMENT_ICON_URL = BASE_URL + 'assets/icons/';

/*
    Item and attribute related magic
*/

// Attributes - this could be from a database eventually?
var CHARACTER_ATTRIBUTES = ['agility', 'dexterity', 'strength', 'mind', 'intelligence', 'charisma'];
var CHARACTER_LEVEL_MAX = 50;

// Item slot names
var SLOT_NAME = new Array();
    SLOT_NAME[1] = 'Shield';
    SLOT_NAME[2] = 'Head';
    SLOT_NAME[3] = 'Body';
    SLOT_NAME[4] = 'Hands';
    SLOT_NAME[5] = 'Legs';
    SLOT_NAME[6] = 'Feet';
    SLOT_NAME[7] = 'Neck';
    SLOT_NAME[8] = 'Finger';
