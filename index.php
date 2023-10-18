<?php
    //Start session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="Author" content="James Cooks u21654680">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--Fonts-->
    <!--EXO2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <!--Raleway-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/splash.css">
</head>
<body>
    <div id="beforeFold">
        <div id="topRight">
            <button id="login" data-toggle="modal" data-target="#signInModal">Login</button>
            <button id="signup" class="signUp" data-toggle="modal" data-target="#signUpModal">Sign up</button>
        </div>
        <div id="foldContent">
            <div id="foldHeaders">
                <h1 class="title">WholeArtedly</h1>
                <h2 class="subtitle">Where feeling meets expression</h2>
            </div>
        <img src="images/logo/dark1.png" id="visual1"/>
        </div>
        <div id="CTA">
            <p>Join our community of artists and art lovers today!</p>
            <button id="join1" class="signUp" data-toggle="modal" data-target="#signUpModal">Join us now</button>
        </div>
        <h2 id="socialTitle">What our users are saying</h2>
        <div id="socialProof">  
            <img class="tweet" src="images\socialProof\bill.png" alt="Bill Gates">
            <img class="tweet" src="images\socialProof\barack.png" alt="Barack Obama">
            <img class="tweet" src="images\socialProof\warren.png" alt="Warren Buffet">
        </div>
    </div>
    <div id="afterFold">
        <div id="features">
            <div class="feature">
                <h1 class="subtitle">Express Yourself</h1>
                <p>Experience the stirring power of art. At WholeArtedly, we provide a platform for you to openly exchange and express those heartfelt emotions.</p>
            </div>
            <div class="feature">
                <h1 class="subtitle">Connect</h1>
                <p>Join our vibrant community and experience the profound emotional connections art has forged among users.</p>
            </div>  
            <div class="feature">
                <h1 class="subtitle">Ease of Use</h1>
                <p>Our intuitive interface makes it easy for you to share your feelings and connect with others.</p>
            </div>
        </div>
        <!--FAQ-->
        <div class="accordion" id="faqAccordion">
        <!-- Question 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="false" aria-controls="answer1">
                What type of art can I post?
            </button>
            </h2>
            <div id="answer1" class="accordion-collapse collapse" aria-labelledby="question1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Anything you want! We welcome all forms of art, from paintings and drawings to poetry and music.
            </div>
            </div>
        </div>
        
        <!-- Question 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                Does it have to be my art?
            </button>
            </h2>
            <div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                No. Any art that has moved you or made you feel any type of way is welcome on our platform.
            </div>
            </div>
        </div>
        
        <!-- Question 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                How do I start?
            </button>
            </h2>
            <div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                To get started, create an account on our platform and click on the "+" in the bottom right  to post your article.
            </div>
            </div>
        </div>
        
        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                Should it be serious?
            </button>
            </h2>
            <div id="answer4" class="accordion-collapse collapse" aria-labelledby="question4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Not at all! Your article can be as serious or as silly as you want it to be. The important thing is that it's meaningful to you.
            </div>
            </div>
        </div>
        </div>
        <div id="CTA2">
            <p>Join our community of artists and art lovers today!</p>
            <button id="join2" class="signUp" data-toggle="modal" data-target="#signUpModal">Join us now</button>
        </div>

    </div>

    <!--Sign in Modal-->

    <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="signInEmail">Email</label>
                        <input type="email" class="form-control" id="signInEmail" name="signInEmail" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="signInPassword">Password</label>
                        <input type="password" class="form-control" id="signInPassword" name="signInPassword" placeholder="Enter your password">
                    </div>
                    <button name="signIn" type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Sign Up Modal -->

<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="index.php">
                    <div class="form-group">
                        <label for="signUpUsername">Username</label>
                        <input type="text" class="form-control" id="signUpUsername" name="signUpUsername" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="signUpEmail">Email</label>
                        <input type="email" class="form-control" id="signUpEmail" name="signUpEmail" placeholder="Enter your email">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="signUpFirstName">First Name</label>
                            <input type="text" class="form-control" id="signUpFirstName" name="signUpFirstName" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="signUpLastName">Last Name</label>
                            <input type="text" class="form-control" id="signUpLastName" name="signUpLastName" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signUpDOB">Date of Birth</label>
                        <input type="date" class="form-control" id="signUpDOB" name="signUpDOB">
                    </div>
                    <div class="form-group">
                        <label for="signUpPassword">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" name="signUpPassword" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="signUpConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signUpConfirmPassword" name="signUpConfirmPassword" placeholder="Confirm your password">
                    </div>
                    <button name="signUp" type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

    //Connect to database
    include("db_connection.php");

    

    //Sign in functionality
    if(isset($_POST["signIn"])){
        
        if(isset($_POST["signInEmail"]) && isset($_POST["signInPassword"])){
            $email = $_POST["signInEmail"];
            $pass = $_POST["signInPassword"];

            //Sanatize input
            $email = mysqli_real_escape_string($mysqli, $email);
            $pass = mysqli_real_escape_string($mysqli, $pass);


            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

            $res = mysqli_query($mysqli, $query);

            if($row = mysqli_fetch_array($res)){
                //Save all user info to session
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["surname"] = $row["surname"];
                $_SESSION["profilePicture"] = $row["profilePicture"];
                $_SESSION["prefrence"] = $row["prefrence"];


                echo '<script>window.location = "home.php";</script>';
            }
            else{
                echo "<script>alert('Incorrect email or password')</script>";
            }
        }
        else{
            echo "Not set";
        }
    }

    //Sign up functionality
    if(isset($_POST["signUp"])){
        if(isset($_POST["signUpUsername"]) && isset($_POST["signUpEmail"]) && isset($_POST["signUpFirstName"]) && isset($_POST["signUpLastName"]) && isset($_POST["signUpDOB"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpConfirmPassword"])){
            $username = $_POST["signUpUsername"];
            $email = $_POST["signUpEmail"];
            $firstName = $_POST["signUpFirstName"];
            $lastName = $_POST["signUpLastName"];
            $dob = $_POST["signUpDOB"];
            $pass = $_POST["signUpPassword"];
            $confirmPass = $_POST["signUpConfirmPassword"];

            //Sanatize input
            $username = mysqli_real_escape_string($mysqli, $username);
            $email = mysqli_real_escape_string($mysqli, $email);
            $firstName = mysqli_real_escape_string($mysqli, $firstName);
            $lastName = mysqli_real_escape_string($mysqli, $lastName);
            $dob = mysqli_real_escape_string($mysqli, $dob);
            $pass = mysqli_real_escape_string($mysqli, $pass);
            $confirmPass = mysqli_real_escape_string($mysqli, $confirmPass);

            //Check if passwords match
            if($pass == $confirmPass){
                //Check if email already exists
                $query = "SELECT * FROM users WHERE email = '$email'";
                $res = mysqli_query($mysqli, $query);

                if(mysqli_num_rows($res) > 0){
                    echo "<script>alert('Email already exists')</script>";
                }
                else{

                    //Insert into database
                    $query = "INSERT INTO `users`(`name`, `surname`, `email`, `username`, `password`, `profilePicture`, `prefrence`, `dateOfBirth`) VALUES ('$firstName', '$lastName', '$email', '$username', '$pass', 'images/profilePictures/default.png', 'dark', '$dob')";
                    $res = mysqli_query($mysqli, $query);

                    if($res){
                        echo "<script>alert('Account created successfully')</script>";
                        $_SESSION["id"] = mysqli_insert_id($mysqli);
                        $_SESSION["username"] = $username;
                        $_SESSION["name"] = $firstName;
                        $_SESSION["surname"] = $lastName;
                        $_SESSION["profilePicture"] = "images/profilePictures/default.png";
                        $_SESSION["prefrence"] = "dark";
                        echo '<script>window.location = "home.php";</script>';
                    }
                    else{
                        echo "<script>alert('Error creating account')</script>";
                    }
                }
            }
            else{
                echo "<script>alert('Passwords do not match')</script>";
            }
        }
        else{
            echo "<script>alert('Please fill in all fields')</script>";
        }
    }
?>








    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- Include Bootstrap JS scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>