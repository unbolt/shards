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

        // Give our chat some heading
        var header = $('<div>');
        header.addClass('header');
        header.text('Chat');

        // Create a container for our chat message
        var messages = $('<div>');
        messages.addClass('messages');
        messages.addClass('container');

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
        input.attr('placeholder', 'Say something...');
        inputContainer.append(input);

        // Throw all the bits in the box
        chatBox.append(header).append(messages).append(inputContainer);

        // Append chat box to the page - hidden for now, no need for it!
        //$('body').append(chatBox);
    }

    function sendMessage(message) {
        // Function to send a message!
        console.log('Submitted message: '+message);

        conn.send(message);
    }

    function receiveMessage(message) {
        // Utility function to check what kind of message we're dealing with
        // and then pass it off to the appropriate function to deal with it.

        if(message.message_type === 'broadcast') {
            showBroadcastMessage(message);
        } else if(message.message_type === 'chat') {
            showChatMessage(message);
        }
    }

    function showChatMessage(message) {
        // Add the message to the chat box
        var messageContainer = $('<div>');
        messageContainer.addClass('message-container');

        // Add the persons name before the message
        var userContainer = $('<div>');
        userContainer.addClass('avatar');
        userContainer.css('background-image', 'url(/avatars/'+message.username+'.jpg)')
        //userContainer.append(message.username);

        // Add the username to the container
        messageContainer.append(userContainer);

        // Add the message to the container
        var messageText = $('<div>');
        messageText.addClass('message-text');
        messageText.text(message.message);
        messageContainer.append(messageText);

        // Add the message to the message container and scroll down a ton
        // Possibly might not work when there's a LOT of chat messages, but
        // chances are that will never happen.
        $('.messages').prepend(messageContainer).scrollTop(1E10);
    }

    function showBroadcastMessage(message) {
        var messageContainer = $('<div>');
        messageContainer.addClass('broadcast');

        messageContainer.text(message.message);

        $('.messages').prepend(messageContainer).scrollTop(1E10);
    }



    console.log('Initializing chat...');

    var conn = new WebSocket('ws://'+window.location.hostname+':9090');

    conn.onopen = function(e) {
        console.log('Connection Established!');
        createChatBox();
    };

    conn.onmessage = function(e) {
        console.log(e);
        // We are returning a json array, need to parse it properly
        // doing this before passing it off to handlers
        var messageJSON = $.parseJSON(e.data);

        // Pass message off to message handler
        receiveMessage(messageJSON);
    };
});
