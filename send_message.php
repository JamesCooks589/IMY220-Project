<?php 
    //Send message
    $user1 = $_POST['user1'];
    $user2 = $_POST['user2'];

    $message = $_POST['message'];

    //Get the current date and time
    $date = date("Y-m-d");
    $time = date("H:i:s");

    //Connect to the database
    include_once 'db_connection.php';

    //Insert the message into the database
    $sql = "INSERT INTO messages (user1, user2, date, time, message) VALUES ('$user1', '$user2', '$date', '$time', '$message')";
    $query = mysqli_query($mysqli, $sql);

    //Redirect the user back to messages.php
    header("Location: messages.php?user1=$user1&user2=$user2");
?>