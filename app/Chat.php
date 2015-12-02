<?php

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


class Chat implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        /*
            New Connection, welcome!

            - Need to get the session details and hook them together

            - This is work to be done here
        */

        $this->clients->attach($conn);
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


        echo "New connection! ({$conn->resourceId})\n";

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

        // Broadcast the message to everyone
        foreach ($this->clients as $client) {
            $client->send($return);
        }
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        // Start the session when receiving a message
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

        $return = array();

        $return['message_type'] = 'chat';
        $return['username'] = $user->name;
        $return['message'] = $msg;

        $return = json_encode($return);

        // Broadcast the message to everyone
        foreach ($this->clients as $client) {
            $client->send($return);
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
