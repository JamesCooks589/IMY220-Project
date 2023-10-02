<?php 
    //Start session
    session_start();
    //Receive data sent from home.js
    $article_id = $_POST['id'];

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'wholeartedly');
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    //Query to get article data
    $sql = "SELECT * FROM articles WHERE article_id = '$article_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    //Make html page
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>'.$row['title'].'</title>
            <!-- Include Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <!--Line Icons-->
            <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
            <!--EXO2-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
            <!--Raleway-->
            <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
            <!-- CSS -->
            <link rel="stylesheet" href="css/article.css">
            <!-- JS -->
            <!--Jquery-->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2" id="article">
                        <figure>
                            <img src="'.$row['artPieceImage'].'" class="img-fluid" alt="Art piece Image">
                            <figcaption>'.$row['artPieceTitle'].' by ' .$row['artist'].'</figcaption>
                        </figure>
                        <h1>'.$row['title'].'</h1>';
                        $hashtags = explode(",", $row['hashtags']);
                        foreach($hashtags as $hashtag){
                            echo '<span class="badge bg-secondary">'.$hashtag.'</span>';
                        }
                        echo '
                        <div class="category">
                            <span class="badge bg-primary">'.$row['category'].'</span>
                        </div>
                        <div class="body">
                            <pre>'.$row['body'].'</pre>
                        </div>
                        <div class="review">
                        

                        
                    </div>
                </div>
            </div>
        </body>
        </html>
    ';
                        
