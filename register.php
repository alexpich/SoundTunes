<?php
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

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
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First name" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <label for="lastName">Username</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email@gmail.com" required>
            </p>
            <p>
                <label for="emailConfirm">Confirm Email</label>
                <input type="email" id="emailConfirm" name="emailConfirm" placeholder="Email@gmail.com" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
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