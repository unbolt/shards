<?php

/*
    Movement

    - Movement server

    - Handles player connections on the map
    - Received their movements from the client
    - Checks that the movement requested is valid
    - Broadcasts it to all other clients connected to the same map
    - Periodically saves the position back to the server
*/

namespace Shards;

use App;
use Auth;
use Config;
use Crypt;
use Session;
use Illuminate\Session\SessionManager;
use DB;
use Carbon;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Shards\User;


class Movement implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        /*
            New connection

            - Get the players location from the database (TODO)
            - Issue the position to the client so it knows where to draw the player

            - Send position of new player to all other connected clients
        */

        $this->clients->attach($conn);
        /*
        // Create a new session handler for this client
        $session = (new SessionManager(App::getInstance()))->driver();
        // Get the cookies
        $cookies = $conn->WebSocket->request->getCookies();
        // Get the laravel's one
        $laravelCookie = urldecode($cookies[Config::get('session.cookie')]);
        // get the user session id from it
        $idSession = Crypt::decrypt($laravelCookie);
        // Set the session id to the session handler
        $session->setId($idSession);
        // Bind the session handler to the client connection
        $conn->session = $session;
        */

        echo "New connection! ({$conn->resourceId})\n";

        // Get the players position on the map from database [TODO]
        $conn->x = 48;
        $conn->y = 48;

        /*
        $conn->session->start();

        $userID = $conn->session->get(Auth::getName());

        if($userID) {
            $user = User::find($userID);
            echo "Username: {$user->name}\n";
        }

        // Broadcast the new connection
        $return = array();

        $return['message_type'] = 'broadcast';
        $return['message'] = "{$user->name} has connected.";

        $return = json_encode($return);
        */

        /*
            We need to send a message out to everyone giving a few details
            - Player ID
            - X, Y position
            - If the client is this particular player, or not
        */
        $player['id'] = $conn->resourceId;
        $player['x'] = $conn->x;
        $player['y'] = $conn->y;

        foreach ($this->clients as $client) {
            if($client->resourceId === $conn->resourceId) {
                //$player['player_type'] = 'you';
                $send['player_type'] = 'you';
                $send = array_merge($send, $player);
                $send = json_encode($send);
                $client->send($send);
                unset($send);
            } else {
                //$player['player_type'] = 'pc';
                $send['player_type'] = 'pc';
                $send = array_merge($send, $player);
                $send = json_encode($send);
                $client->send($send);
                unset($send);
            }
        }

    }

    public function onMessage(ConnectionInterface $from, $msg) {

        // Start the session when receiving a message
/*
        $from->session->start();

        $userID = $from->session->get(Auth::getName());

        if($userID) {
            $user = User::find($userID);
            echo "Username: {$user->name}\n";
        } else {
            echo "Could not find user.\n";
        }

        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

            /*


        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
        */

/*
        $return = array();

        $return['message_type'] = 'chat';
        $return['username'] = $user->name;
        $return['message'] = $msg;

        $return = json_encode($return);
*/
        //echo "{$msg}";

        // We have received some movement
        // If we've received movement we need to confirm back to the client that we have got it
        // We also need to send it out to all the other clients


        echo "Movement received.\n";

        $msg = json_decode($msg);

        $player['id'] = $from->resourceId;
        $player['x'] = $msg->{'x'};
        $player['y'] = $msg->{'y'};

        echo "Looping through clients.\n";
        foreach ($this->clients as $client) {
            if($client->resourceId === $from->resourceId) {
                echo "Sending message back to same client.\n";
                //$player['player_type'] = 'you';
                $send['player_type'] = 'you';
                $send = array_merge($send, $player);
                $send = json_encode($send);
                $client->send($send);
                unset($send);
            } else {
                //$player['player_type'] = 'pc';
                echo "Sending message to another player.\n";
                $send['player_type'] = 'pc';
                $send = array_merge($send, $player);
                $send = json_encode($send);
                $client->send($send);
                unset($send);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

}
