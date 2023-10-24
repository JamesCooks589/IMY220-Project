<?php 
    session_start();
    include_once "db_connection.php";

    if (!isset($_SESSION['id'])) {
        // Handle unauthenticated users as needed
        die("Unauthorized");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user1 = $_GET['user1'];
        $user2 = $_GET['user2'];

        $sql = "SELECT * FROM messages WHERE (user1 = '$user1' AND user2 = '$user2') OR (user1 = '$user2' AND user2 = '$user1') ORDER BY id ASC";
        $query = mysqli_query($mysqli, $sql);

        $messages = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $user1 = $row['user1'];
            $message = $row['message'];
            $date = $row['date'];
            $time = $row['time'];

            $sql2 = "SELECT * FROM users WHERE id = '$user1'";
            $query2 = mysqli_query($mysqli, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            $username = $row2['username'];

            $messages[] = array(
                'message' => $message,
                'username' => $username,
                'date' => $date,
                'time' => $time,
            );
        }

        echo json_encode($messages);
    }
?>
