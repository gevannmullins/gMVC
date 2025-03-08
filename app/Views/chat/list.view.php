<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    .chat-box {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .chat-history {
        height: 300px;
        border: 1px solid #ddd;
        overflow-y: scroll;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .chat-history .message {
        padding: 5px 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .chat-history .message:last-child {
        border-bottom: none;
    }

    .chat-history .message span {
        font-weight: bold;
    }

    .chat-input {
        display: flex;
        gap: 10px;
    }

    .chat-input input[type="text"] {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .chat-input button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .chat-input button:hover {
        background-color: #0056b3;
    }
</style>

<!-- Chat form -->
<div class="chat-box">
    <div class="chat-history" id="chat-history">
        <!-- Messages will be displayed here -->
    </div>

    <div class="chat-input">
        <select id="recipient">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" id="message" placeholder="Your Message" required>
        <button id="send-btn">Send</button>
    </div>
</div>

<script>
    // Fetch private messages every second
    setInterval(fetchMessages, 1000);

    // Fetch messages between the current user and the selected recipient
    function fetchMessages() {
        var recipient_id = $('#recipient').val();
        $.ajax({
            url: '/chat/messages',
            method: 'POST',
            data: { recipient_id: recipient_id },
            success: function (response) {
                $('#chat-history').html(response);
            }
        });
    }

    // Send a message when the Send button is clicked
    $('#send-btn').on('click', function () {
        var recipient_id = $('#recipient').val();
        var message = $('#message').val();

        if (message) {
            $.ajax({
                url: '/chat/send',
                method: 'POST',
                data: { recipient_id: recipient_id, message: message },
                success: function () {
                    $('#message').val(''); // Clear the message input field
                    fetchMessages(); // Fetch new messages
                }
            });
        } else {
            alert('Please enter a message.');
        }
    });
</script>