<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash</title>
    <meta name="Author" content="James Cooks u21654680">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/splash.css">
</head>
<body>
    <div id="beforeFold">
        <div id="topRight">
            <button id="login">Login</button>
            <button id="signup" class="signUp">Sign up</button>
        </div>
        <div id="foldContent">
            <h1>wholEArtidley</h1>
            <h2>Where feelings meet expression</h2>
        <img src="images/logo/dark1.png" id="visual1"/>
        </div>
        <button id="join1" class="signUp">Join us now</button>
        <div id="socialProof">
            <h2>What our users are saying</h2>
            <img class="tweet" src="images\socialProof\bill.png" alt="Bill Gates">
            <img class="tweet" src="images\socialProof\barack.png" alt="Barack Obama">
            <img class="tweet" src="images\socialProof\warren.png" alt="Warren Buffet">
        </div>
    </div>
    <div id="afterFold">
        <div id="features">
            <div class="feature">
                <h1>Express Yourself</h1>
                <p>Experience the stirring power of art. At wholEArtidley, we provide a platform for you to openly exchange and express those heartfelt emotions.</p>
            </div>
            <div class="feature">
                <h1>Connect</h1>
                <p>Join our vibrant community and experience the profound emotional connections art has forged among users.</p>
            </div>  
            <div class="feature">
                <h1>Ease of Use</h1>
                <p>Our intuitive interface makes it easy for you to share your feelings and connect with others.</p>
            </div>
        </div>

        <h2>So what are you waiting for ?</h2>
        <button id="join2" class="signUp">Join us now</button>

    </div>

    <dialog id="signupModal">
        <div id="signupModalContent">
            <span class="close">&times;</span>
            <h1>Sign up</h1>
            <form action="php/signup.php" method="POST">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="password2" placeholder="Confirm Password" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="submit" value="Sign up">
            </form>
        </div>
    </dialog>

    <dialog id="loginModal">
        <div id="loginModalContent">
            <span class="close">&times;</span>
            <h1>Login</h1>
            <form action="php/login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </dialog>
</body>
</html>