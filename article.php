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
    $articleCreatorId = $row['user_id'];

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
                    <div class="logo col-md-2">
                        <a href="home.php"><img src="images/logo/dark1.png" alt="Whole Artedly Logo"></a>
                    </div>
                    <div class="col-md-8" id="article">
                        <figure>
                            <img src="'.$row['artPieceImage'].'" class="img-fluid" alt="Art piece Image">
                            <figcaption>'.$row['artPieceTitle'].' by ' .$row['artist'].'</figcaption>
                        </figure>
                        <h1>'.$row['title']. ' by <form method="POST" action="profile.php"><input hidden type="text" name="userID" id="id" value="'.$articleCreatorId.'"><button type="submit" class="btn btn-primary" name="submit" id="submit">'.$row['author'].'</button></form></h1>';
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
                        </div>';

                        echo '<div class="userReview">
                            <div class="like-dislike">
                                <div class="likes">
                                    <h6>'.$row['likes'].'</h6>
                                    <button type="button" class="btn btn-primary" id="like"><i class="lni lni-thumbs-up"></i></button>
                                </div>
                                <div class="dislikes">
                                    <h6>'.$row['dislikes'].'</h6>
                                    <button type="button" class="btn btn-primary" id="dislike"><i class="lni lni-thumbs-down"></i></button>
                                </div>
                            </div>
                            <h2>What did you think of this article?</h2>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input hidden type="text" name="id" id="id" value="'.$article_id.'">
                                <div class="form-group">
                                    <textarea class="form-control" name="review" id="review" cols="30" rows="10" placeholder="Write your review here" required></textarea>
                                </div>
                                <div class="form-group">
                                    <h6>Upload image to support your review</h6>
                                    <input type="file" class="form-control" name="reviewImage" id="reviewImage" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submitReview" id="submitReview">Submit</button>
                            </form>
                        </div>';
                        echo '<div class="reviews">
                            <h2>What others are thinking</h2>';
                            //Query to get reviews
                            $sql = "SELECT * FROM reviews WHERE article_id = '$article_id'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                        <div class="review">
                                            <div class="reviewer">';
                                                //Query to get profile picture
                                                $sql = "SELECT profilePicture FROM users WHERE username = '$row[username]' ";
                                                $result2 = mysqli_query($conn, $sql);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                echo '<img src="'.$row2['profilePicture'].'" alt="Profile Picture" class="profilePicture">
                                                <h3>'.$row['username'].'</h3>
                                            </div>
                                            <div class="review-body">';
                                                if($row['reviewImage'] != ""){
                                                    echo '<img src="'.$row['reviewImage'].'" alt="Review Image" id="reviewImage">';
                                                }
                                                echo '
                                                <pre>'.$row['reviewText'].'</pre>
                                                
                                            </div>
                                            <div review-footer>
                                                <h6>'.$row['date'].'</h6>
                                                <div class="like-dislike">
                                                    <button type="button" class="btn btn-primary" id="like"><i class="lni lni-thumbs-up"></i></button>
                                                    <button type="button" class="btn btn-primary" id="dislike"><i class="lni lni-thumbs-down"></i></button>
                                                </div>
                                            </div>';
                                            if(isset($_SESSION['id'])){
                                                if($_SESSION['id'] == $row['user_id']){
                                                    //form to delete review
                                                    echo '
                                                        <form method="POST" action="">
                                                            <input hidden type="text" name="reviewId" id="reviewId" value="'.$row['review_id'].'">
                                                            <input hidden type="text" name="id" id="articleId" value="'.$article_id.'">
                                                            <button type="submit" class="btn btn-primary" name="deleteReview" id="deleteReview">Delete</button>
                                                        </form>
                                                    ';
                                                }
                                                //Else if it is the creator of the article allow them to also delete reviews
                                                else if($_SESSION['id'] == $articleCreatorId){
                                                    //form to delete review
                                                    echo '
                                                        <form method="POST" action="">
                                                            <input hidden type="text" name="reviewId" id="reviewId" value="'.$row['review_id'].'">
                                                            <input hidden type="text" name="id" id="articleId" value="'.$article_id.'">
                                                            <button type="submit" class="btn btn-primary" name="deleteReview" id="deleteReview">Delete</button>
                                                        </form>
                                                    ';
                                                }
                                            }
                                        echo '</div>
                                    ';
                                }
                            }
                            else{
                                echo '<h3>No reviews yet</h3>';
                            }
                            echo '                                                 
                    </div>
                    </div>';
                    //If the user is logged in allow them to add the article to a list
                    //SIDEBAR
                    echo '
                    <div class="sidebar col-md-2">
                        <div class="profile">
                            <img src="'.$_SESSION['profilePicture'].'" alt="Profile Picture">
                            <h3>'.$_SESSION['username'].'</h3>
                        </div>
                        <div class="lists">
                            <form method="POST" action="">
                                <input hidden type="text" name="id" id="id" value="'.$article_id.'">
                                ';
                                //Allow user to create new list with input field and submit button or select a list to add the article to
                                $sql = "SELECT * FROM lists WHERE user_id = '$_SESSION[id]'";
                                $result = mysqli_query($conn, $sql);

                               
                                echo '
                                    <div class="newList">
                                        <h6>Create New List</h6>
                                        <label for="newList">New List name</label>
                                        <input type="text" class="form-control" name="newList" id="newList" placeholder="New List">
                                        <br>
                                        <label for="newListDescription">What is the list about?</label>
                                        <input type="text" class="form-control" name="newListDescription" id="newListDescription" placeholder="Description" maxlength="255">
                                        <button type="submit" class="btn btn-primary" name="submitNewList" id="submitNewList">Submit</button>
                                    </div>
                                    <class="existingList">
                                        <label for="existingList">Add article to Existing List</label>
                                        <select class="form-control" name="existingList" id="existingList">
                                            <option value="none">Select List</option>';
                                            while($listRow = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$listRow['list_id'].'">'.$listRow['listName'].'</option>';
                                            }
                                            echo '
                                        </select>
                                        <button type="submit" class="btn btn-primary" name="submitExistingList" id="submitExistingList">Submit</button>
                                    </div>

                            </form>';
                            
                            //If the user is creator of the article allow them to edit and delete the article
                            //Edit modal
                            echo '
                            <div class="edit-delete">';
                            if(isset($_SESSION['id'])){
                                if($_SESSION['id'] == $articleCreatorId){
                                    //Edit button to toggle edit modal and delete button in a form
                                    echo '
                                        <br>
                                        <h6>Edit or Delete Article</h6>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editArticle">Edit</button>
                                        <form method="POST" action="">
                                            <input hidden type="text" name="id" id="id" value="'.$article_id.'">
                                            <button type="submit" class="btn btn-primary" name="delete" id="delete">Delete</button>
                                        </form>';
                                }
                            }
                            
                            echo '
                           </div>
                        </div>
                    </div>
            </div>

            ';
            //Edit modal with form to edit article data and submit button to submit changes
            $sql = "SELECT * FROM articles WHERE article_id = '$article_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo ' 
            <div class="modal fade" id="editArticle" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="articleModalLabel">Edit Article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <input hidden type="text" name="id" id="id" value="'.$article_id.'">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="'.$row['title'].'" required>
                                    <label for="hashtags">Hashtags</label>
                                    <input type="text" class="form-control" name="hashtags" id="hashtags" value="'.$row['hashtags'].'" required>
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="visual_art">Visual Art</option>
                                        <option value="sculpture">Sculpture</option>
                                        <option value="music">Music</option>
                                        <option value="literature">Literature</option>
                                        <option value="performing_art">Performing Art</option>
                                        <option value="theatre">Theatre</option>
                                        <option value="film">Film</option>
                                        <option value="architecture">Architecture</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="photography">Photography</option>
                                        <option value="digital_art">Digital Art</option>
                                    </select>
                                    <label for="body">Body</label>
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="10" required>'.$row['body'].'</textarea>
                                    <label for="artPieceTitle">Art Piece Title</label>
                                    <input type="text" class="form-control" name="artPieceTitle" id="artPieceTitle" value="'.$row['artPieceTitle'].'" required>
                                    <label for="artist">Artist</label>
                                    <input type="text" class="form-control" name="artist" id="artist" value="'.$row['artist'].'" required>
                                    <label for="artPieceImage">Art Piece Image</label>
                                    <input type="file" class="form-control-file" name="artPieceImage" id="artPieceImage" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submitEdit" id="submitEdit">Submit</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Include Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

            <!-- JS -->
            <script src="js/article.js"></script>
        </body>
        </html>';


    //Add review
    if(isset($_POST['submitReview'])){
        $review = $_POST['review'];
        $date = date("Y-m-d");
        $intArticleId = (int)$article_id;
        //If there is an image upload the  name of the image otherwise set it to empty
        //Check if file is of type image
        if(isset($_FILES['reviewImage'])){
            $target_dir = "images/reviews/";
            $target_file = $target_dir . basename($_FILES['reviewImage']['name']);
            $uploadOK = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['reviewImage']['tmp_name']);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "<script>alert('File is not an image.')</script>";
                $uploadOk = 0;
            }

            //Check size
            if($_FILES['reviewImage']['size'] > 2000000){
                echo "<script>alert('File is too large.')</script>";
                $uploadOk = 0;
            }

            //Only allow jpg, png and jpeg
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                echo "<script>alert('Only JPG, JPEG and PNG files are allowed.')</script>";
                $uploadOk = 0;
            }

            //Check if uploadOK is set to 0 by an error
            if($uploadOk == 0){
                echo "<script>alert('File was not uploaded.')</script>";
            }
            else{
                //Hash filename + current unix time to create unique name
                $hash = hash('md5', $_FILES['reviewImage']['name'] . time());
                $target_file = $target_dir . $hash . "." . $imageFileType;
                $filename = $hash . "." . $imageFileType;
                if(move_uploaded_file($_FILES['reviewImage']['tmp_name'], $target_file)){
                    echo "File uploaded";
                }
                else{
                    echo "Error uploading file";
                }

                //Upload review to database in order review_id(AutoIncrement) article_id user_id reviewText	reviewImage	date(Today)	likes	dislikes
                $sql = "INSERT INTO reviews(article_id, user_id, username, reviewText, reviewImage, date, likes, dislikes) VALUES('$article_id', '$_SESSION[id]', '$_SESSION[username]', '$review', '$target_file', '$date', 0, 0)";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    echo "Error: ".mysqli_error($conn);
                }

                unset($_POST['submitReview']);
            }


        }
        else{
            //Upload review to database in order review_id(AutoIncrement) article_id user_id reviewText	reviewImage	date(Today)	likes	dislikes
            $sql = "INSERT INTO reviews(article_id, user_id, username, reviewText, reviewImage, date, likes, dislikes) VALUES('$article_id', '$_SESSION[id]', '$_SESSION[username]', '$review', '', '$date', 0, 0)";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error: ".mysqli_error($conn);
            }
        }
        unset($_POST['submitReview']);
    }

    //Delete review
    if(isset($_POST['deleteReview'])){
        $reviewId = $_POST['reviewId'];
        $articleId = $_POST['id'];
        //Delete review from database
        $sql = "DELETE FROM reviews WHERE review_id = '$reviewId'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error: ".mysqli_error($conn);
        }

        unset($_POST['deleteReview']);
        
    }

    //Delete article and redirect to home.php
    if(isset($_POST['delete'])){
        $articleId = $_POST['id'];
        //Delete article from database
        $sql = "DELETE FROM articles WHERE article_id = '$articleId'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error: ".mysqli_error($conn);
        }
        //Echo a script to redirect to home.php
        echo '
            <script>
                window.location.href = "home.php";
            </script>
        ';
        unset($_POST['delete']);
    }

    //Edit article
    if(isset($_POST['submitEdit'])){
        $title = $_POST['title'];
        $hashtags = $_POST['hashtags'];
        $category = $_POST['category'];
        $body = $_POST['body'];
        $artPieceTitle = $_POST['artPieceTitle'];
        $artist = $_POST['artist'];
        $date = date("Y-m-d");
        $intArticleId = (int)$article_id;
        //If there is an image upload the  name of the image otherwise set it to empty
        //Check if file is of type image
        if(isset($_FILES['artPieceImage'])){
            $target_dir = "images/articles/";
            $uploadFile = $_FILES['artPieceImage'];
            $checkSize = getimagesize($uploadFile["tmp_name"][0]);
            $uploadOK = 1;
            if($checkSize !== false){
                //Check if file is larger than 2MB
                if($uploadFile["size"][0] > 2000000){
                    echo "File is too large";
                    $uploadOK = 0;
                }
                else{
                    $uploadOK = 1;
                }
            }
            else{
                echo "File is not an image";
                $uploadOK = 0;
            }
            $checkFileType = strtolower(pathinfo($uploadFile["name"][0], PATHINFO_EXTENSION));
            if($checkFileType == "png" || $checkFileType == "jpg" || $checkFileType == "jpeg"){
                $uploadOK = 1;
            }
            else{
                echo "File is not a png, jpg or jpeg";
                $uploadOK = 0;
            }

            //Get file extension
            $fileExtension = pathinfo($uploadFile["name"][0], PATHINFO_EXTENSION);

            //Hash filename to  create unique name
            $hash = hash('md5', $uploadFile["name"][0]);
            $target_file = $target_dir . $hash . "." . $fileExtension;
            $filename = $hash . "." . $fileExtension;

            //Upload Image
            if($uploadOK == 1){
                if(move_uploaded_file($uploadFile["tmp_name"][0], $target_file)){
                    echo "File uploaded";
                }
                else{
                    echo "Error uploading file";
                }
            }

            //Update article in database
            $sql = "UPDATE articles SET title = '$title', hashtags = '$hashtags', category = '$category', body = '$body', artPieceTitle = '$artPieceTitle', artist = '$artist', artPieceImage = '$target_file' WHERE article_id = '$article_id'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error: ".mysqli_error($conn);
            }
        }
        else{
            //Update article in database
            $sql = "UPDATE articles SET title = '$title', hashtags = '$hashtags', category = '$category', body = '$body', artPieceTitle = '$artPieceTitle', artist = '$artist' WHERE article_id = '$article_id'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error: ".mysqli_error($conn);
            }
        }
        unset($_POST['submitEdit']);
    }

    //Create new list
    if(isset($_POST['submitNewList'])){
        $listName = $_POST['newList'];
        //Insert new list into database
        $sql = "INSERT INTO lists(user_id, listName, description, articles) VALUES('$_SESSION[id]', '$listName', '$_POST[newListDescription]','')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error: ".mysqli_error($conn);
        }
        else{
            echo '
                <script>
                    alert("List created");
                </script>
            ';
        }
        unset($_POST['submitNewList']);
    }

    //Add article to existing list
    if(isset($_POST['submitExistingList'])){
        $listId = $_POST['existingList'];
        //Insert article into list in database
        $sql = "SELECT * FROM lists WHERE list_id = '$listId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $articles = $row['articles'];
        if($articles == ""){
            $articles = $article_id;
        }
        else{
            $articles = $articles . "," . $article_id;
        }
        $sql = "UPDATE lists SET articles = '$articles' WHERE list_id = '$listId'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error: ".mysqli_error($conn);
        }
        else{
            echo '
                <script>
                    alert("Article added to list");
                </script>
            ';
        }
        unset($_POST['submitExistingList']);
    }
?>