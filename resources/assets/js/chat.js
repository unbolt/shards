$(function() {
    /*
        Chat related scripts

        - Interacts with sockets server

    */

    function createChatBox() {
        // This function makes our chat box and appends it to the page
        // This happens here because reasons. Such as only creating a chat box for logged
        // in users. That'll come later.
        // We could also one day want to make more than one chat box

        var chatBox = $('<div>');

        // Add some classes to it
        chatBox.addClass('chatbox');

        // Create a container for our chat message
        var messages = $('<div>');
        messages.addClass('messages');

        // Create an input for putting in chat messages
        var inputContainer = $('<div>');
        inputContainer.addClass('typebox');
        // Best actually have a text box for the typing...
        var input = $('<input>');
        // Add an event to the enter key
        input.keypress(function(e) {
            var key = e.which;
            if(key == 13) {
                // Enter key!
                // Send the message
                sendMessage(this.value);
                // Clear the input afterwards
                $(input).val('');
            }
        });

        inputContainer.append(input);

        // Throw all the bits in the box
        chatBox.append(messages).append(inputContainer);

        // Append chat box to the page
        $('body').append(chatBox);
    }

    function sendMessage(message) {
        // Function to send a message!
        console.log('Submitted message: '+message);

        conn.send(message);
    }

    function receiveMessage(message) {
        // Add the message to the chat box
        var messageContainer = $('<div>');

        // Add the persons name before the message
        var userContainer = $('<span>');
        userContainer.append(message.username);

        // Add the username to the container
        messageContainer.append(userContainer);

        // Add the message to the container
        messageContainer.append(message.message);


        $('.messages').append(messageContainer);
    }



    console.log('Initializing chat...');

    var conn = new WebSocket('ws://'+window.location.hostname+':9090');

    conn.onopen = function(e) {
        console.log('Connection Established!');
        conn.send('Hello Me!');
        createChatBox();
    };

    conn.onmessage = function(e) {
        console.log(e);
        // We are returning a json array, need to parse it properly
        // doing this before passing it off to handlers
        var messageJSON = $.parseJSON(e.data);
        receiveMessage(messageJSON);
    };
});
