<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your custom CSS styles */
        #chat-container {
            max-width: 800px;
            margin: auto;
            padding: 10px;
        }

        /* Style for chat room list */


        /* Style for chat content */
        #chat-content {
            height: calc(100vh - 160px);
            /* Adjust the height of chat content */
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        /* Style for chat message boxes */
        .message-box {
            background-color: #f0f0f0;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .message-box:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

        /* Input group style */
        .input-group {
            margin-top: 20px;
        }
        .list-group-item-left {
    text-align: left; /* Căn trái cho tin nhắn */
    background-color: #f0f0f0; /* Màu nền cho tin nhắn ở bên trái */
    border: 1px solid #ccc; /* Viền cho tin nhắn ở bên trái */
    border-radius: 5px; /* Bo tròn góc cho tin nhắn ở bên trái */
    margin-bottom: 5px; /* Khoảng cách giữa các tin nhắn */
    padding: 5px 10px; /* Khoảng cách nội dung trong tin nhắn */
}

.list-group-item-right {
    text-align: right; /* Căn phải cho tin nhắn */
    background-color: #d4edda; /* Màu nền cho tin nhắn ở bên phải */
    border: 1px solid #c3e6cb; /* Viền cho tin nhắn ở bên phải */
    border-radius: 5px; /* Bo tròn góc cho tin nhắn ở bên phải */
    margin-bottom: 5px; /* Khoảng cách giữa các tin nhắn */
    padding: 5px 10px; /* Khoảng cách nội dung trong tin nhắn */
}

    </style>
</head>

<body>
    <a href="../index.php" class="btn btn-primary">Trang chủ</a>
    <?php 
    if(!isset($_SESSION['user']['id'])){
        echo     '<a href="../view/login.php">Đăng nhập</a>';
    }
    ?>
    <div id="chat-container" class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Room list will be populated here -->
                <h1 class="title">Phòng Chat</h1>
                <div id="room-list" style="padding:10px 0 10px 0">

                    <!-- Room list will be populated here -->
                </div>
                <button class="btn btn-success" onclick="addRoom()">Add Room</button>

            </div>
            <div class="col-md-9">
                <!-- Chat content will be populated here -->
                <div id="chat-content">
                    <!-- Chat content will be populated here -->
                </div>
                <div class="input-group">
                    <input type="text" id="message-input" class="form-control" placeholder="Type your message">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="sendMessage()">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var currentRoomId = null; // Variable to store the current room ID

        function loadRooms() {
    // AJAX to fetch and populate room list
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Parse the JSON response
                var rooms = JSON.parse(xhr.responseText);
                // Populate the room list
                var roomList = document.getElementById("room-list");
                roomList.innerHTML = "";
                rooms.forEach(function(room) {
                    var roomDiv = document.createElement("div");
                    roomDiv.innerHTML = room.id; // Assuming you have an 'id' property for rooms
                    roomDiv.classList.add("btn","btn-info"); // Adding Bootstrap classes
                    roomDiv.onclick = function() {
                        setCurrentRoomId(room.id); // Set the current room ID when a room is clicked
                        loadChatContent(currentRoomId);

                    };
                    roomList.appendChild(roomDiv);
                });
            } else {
                console.error("Error loading rooms. Status: " + xhr.status);
            }
        }
    };
    xhr.open("GET", "backend.php?action=getRooms", true);
    xhr.send();
}


function loadChatContent(roomId, userId) {
    // AJAX to fetch and populate chat content based on roomId
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Parse the JSON response
                var messages = JSON.parse(xhr.responseText);
                // Populate the chat content
                var chatContent = document.getElementById("chat-content");
                chatContent.innerHTML = "";
                chatContent.className = "list-group"; // Add Bootstrap class to chat content
                messages.forEach(function(message) {
                    var messageDiv = document.createElement("div");
                    messageDiv.className = "list-group-item"; // Default Bootstrap class for messages
                    if (message.SenderId == <?php echo $_SESSION['user']['id']?>) {
                        // If SenderId matches UserId, align message to the right
                        messageDiv.classList.add("list-group-item-right");
                    } else {
                        // If SenderId does not match UserId, align message to the left
                        messageDiv.classList.add("list-group-item-left");
                    }
                    messageDiv.innerHTML = message.sender + ": " + message.text;
                    chatContent.appendChild(messageDiv);
                });
            } else {
                console.error("Error loading chat content. Status: " + xhr.status);
            }
        }
    };
    xhr.open("GET", "backend.php?action=getMessages&roomId=" + roomId, true);
    xhr.send();
}


        function sendMessage() {
            var messageInput = document.getElementById("message-input");
            var messageText = messageInput.value;

            if (!currentRoomId) {
                console.error("No room selected. Cannot send message.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // Handle the response, if needed
                        console.log(xhr.responseText); // Log the response for debugging
                        // Clear the input field after sending the message
                        messageInput.value = "";
                        // Reload the chat content for the current room
                        loadChatContent(currentRoomId);
                    } else {
                        console.error("Error sending message. Status: " + xhr.status);
                    }
                }
            };

            xhr.open("POST", "backend.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=sendMessage&roomId=" + currentRoomId + "&messageText=" + encodeURIComponent(messageText));
        }

        var messageLoadingInterval; // Variable to hold the interval ID

        function loadChatContentAtIntervals(roomId) {
            clearInterval(messageLoadingInterval); // Clear previous interval
            loadChatContent(roomId); // Load chat content initially

            // Set interval to load chat content for the current room
            messageLoadingInterval = setInterval(function() {
                loadChatContent(roomId);
            }, 2000); // 2 seconds interval (2000 milliseconds)
        }

        function setCurrentRoomId(roomId) {
            currentRoomId = roomId;
            if (currentRoomId) {
                loadChatContentAtIntervals(currentRoomId);
            }
        }
        // Load rooms on page load
        window.onload = function() {
            loadRooms();
        };

        function addRoom() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // Handle the response, if needed
                        console.log(xhr.responseText); // Log the response for debugging
                        // Reload the rooms after adding a room
                        loadRooms();
                    } else {
                        console.error("Error adding room. Status: " + xhr.status);
                    }
                }
            };

            xhr.open("POST", "backend.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=addroom");
        }
    </script>

</body>

</html>