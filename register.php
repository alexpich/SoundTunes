<?php

function sanitizeFormUsername($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeFormPassword($inputText)
{
    $inputText = strip_tags($inputText);
    return $inputText;
}

if (isset($_POST['loginButton'])) { }

if (isset($_POST['registerButton'])) {
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $emailConfirm = sanitizeFormString($_POST['emailConfirm']);
    $password = sanitizeFormPassword($_POST['password']);
    $passwordConfirm = sanitizeFormPassword($_POST['passwordConfirm']);
}

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
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First name" required>
            </p>
            <p>
                <label for="lastName">Username</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email@gmail.com" required>
            </p>
            <p>
                <label for="emailConfirm">Confirm Email</label>
                <input type="email" id="emailConfirm" name="emailConfirm" placeholder="Email@gmail.com" required>
            </p>
            <p>
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