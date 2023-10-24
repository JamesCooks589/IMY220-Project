<?php
    session_start();
    include_once "db_connection.php";

    if (!isset($_SESSION['id'])) {
        //Take user to index.php if they are not logged in
        header("Location: index.php");
    }

    //Get the id of the user to delete
    $id = $_POST['userID'];

    //Look for all of the user's articles and set their deleted column to 1

    $sql = "UPDATE articles SET deleted = 1 WHERE user_id = '$id'";
    $query = mysqli_query($mysqli, $sql);

    //Delete all of the user's reviews
    $sql = "DELETE FROM reviews WHERE user_id = '$id'";
    $query = mysqli_query($mysqli, $sql);

    //Delete all of the user's messages
    $sql = "DELETE FROM messages WHERE user1 = '$id' OR user2 = '$id'";
    $query = mysqli_query($mysqli, $sql);

    //Delete the user
    $sql = "DELETE FROM users WHERE id = '$id'";
    $query = mysqli_query($mysqli, $sql);

    //Take the user back to index.php
    header("Location: index.php");
?>