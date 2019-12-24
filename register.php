<?php
include("includes/classes/Account.php");

$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soundify</title>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="********" required>
            </p>

            <button type="submit" name="loginButton">LOG IN</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create an account</h2>
            <p>
                <?php echo $account->getError("Your username must be between 5 and 25 characters."); ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </p>
            <p>
                <?php echo $account->getError("Your first name must be between 2 and 25 characters."); ?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First name" required>
            </p>
            <p>
                <?php echo $account->getError("Your last name must be between 2 and 25 characters."); ?>
                <label for="lastName">Username</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
            </p>
            <p>
                <?php echo $account->getError("Email does not match."); ?>
                <?php echo $account->getError("That is not a valid email."); ?>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email@gmail.com" required>
            </p>
            <p>
                <label for="emailConfirm">Confirm Email</label>
                <input type="email" id="emailConfirm" name="emailConfirm" placeholder="Email@gmail.com" required>
            </p>
            <p>
                <?php echo $account->getError("Your passwords don't match"); ?>
                <?php echo $account->getError("Your password can only contain numbers and letters."); ?>
                <?php echo $account->getError("Your password must be between 6 and 30 characters"); ?>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </p>
            <p>
                <label for="passwordConfirm">Confirm Password</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="********" required>
            </p>

            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>
</body>

</html>