<?php
session_start();
// Include your database connection code
include 'db.php';
include "../model/pdo.php";

// Function to fetch and return the list of chat rooms
function getIDnv(){
    $query="SELECT id FROM taikhoan where vaitro ='chat' limit 1";
    return pdo_query($query);
}
$idnv= getIDnv()[0]['id'];
function getChatRooms($UserID)
{

    $query = "SELECT id FROM ChatRooms Where User1ID=$UserID OR User2ID=$UserID";
    $result = pdo_query($query);
    $rooms = array();
    foreach ($result as $key) {
        $rooms[] = $key;
    }

    return $rooms;
}
function addRoom($userID,$idnv)
{
    // Your logic to add a room here, for example:
    $query = "INSERT INTO ChatRooms (User1id,user2id) VALUES ($userID,$idnv)";
    pdo_execute($query);
}
// Function to fetch and return chat messages based on the room ID
function getChatMessages($roomId)
{

    $query = "SELECT m.MessageText as text, t.hoten as sender,m.SenderID as SenderId
    FROM Messages m
    JOIN taikhoan t ON m.SenderID = t.id
    WHERE m.roomid = $roomId
    ORDER BY m.MessageTime ASC";
    $result = pdo_query($query);
    $messages = array();
    foreach ($result as $row) {
        $messages[] = $row;
    }

    return $messages;
}

// Function to insert a new message into the database
function sendMessage($roomId, $senderId, $messageText)
{

    $query = "INSERT INTO Messages (roomid, SenderID, MessageText, MessageTime)
              VALUES ($roomId, $senderId, '$messageText', NOW())";

    pdo_execute($query);
}
$userId = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_GET["action"] === "getRooms") {
        $rooms = getChatRooms($userId);
        echo json_encode($rooms);
    } elseif ($_GET["action"] === "getMessages") {
        $roomId = $_GET["roomId"];
        $messages = getChatMessages($roomId);
        echo json_encode($messages);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "sendMessage") {
        $roomId = $_POST["roomId"];
        $senderId = $userId;
        $messageText = $_POST["messageText"];
        sendMessage($roomId, $senderId, $messageText);
        echo "Message sent successfully!";
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "addroom") {

    addRoom($userId,$idnv);
    echo "Room added successfully!";
}
// Close the database connection
