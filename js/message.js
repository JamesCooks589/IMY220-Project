$(document).ready(function () {
    // Function to update messages
    function updateMessages() {
        const user1 = $('#user1').text();
        const user2 = $('#user2').text();
        //Comma separated list of the 2 usernames
        const usernames = $('#usernames').text();
        let username1 = usernames.split(',')[0];
        let username2 = usernames.split(',')[1];


        $.ajax({
            type: 'GET',
            url: 'update_messages.php',
            data: { user1, user2 },
            dataType: 'json',
            success: function (data) {
                // Clear existing messages
                $('#messages-container').empty();

                // Append new messages
                for (const message of data) {
                    const messageHtml = `
                        <div class="message ${username1 === message.username ? 'sent' : 'received'}">
                            <p class="message-content">${message.message}</p>
                            <p class="message-info">${message.username}, ${message.date}, ${message.time}</p>
                        </div>
                    `;
                    $('#messages-container').append(messageHtml);
                }
            },
        });
    }

    // Periodically update messages every 0.5 seconds
    setInterval(updateMessages, 500);

    //Enter key also sends message
    $('#message').keydown(function (e) {
        if (e.keyCode === 13 && !e.shiftKey) {
            e.preventDefault(); // Prevent line break in the textarea
            sendMessage();
        }
    });

    // Function to update users
    $('#message-form').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'send_message.php', // Adjust this URL
            data: formData,
            success: function (data) {
                // Handle success as needed
                // You may want to clear the message input, for example
                $('#message').val('');
            },
        });
    });
});
