<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Soundify</title>

    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
    <?php
    if (isset($_POST['registerButton'])) {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                });
             </script>';
    } else {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").show();
                    $("#registerForm").hide();
                });
             </script>';
    }
    ?>



    <div id="background">

        <div id="loginContainer">

            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" placeholder="********" required>
                    </p>

                    <button type="submit" name="loginButton">LOG IN</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create an account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php getInputValue('username') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="First name" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Last name" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@gmail.com" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <label for="emailConfirm">Confirm Email</label>
                        <input type="email" id="emailConfirm" name="emailConfirm" placeholder="email@gmail.com" value="<?php getInputValue('emailConfirm') ?>" required>
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

                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Login here.</span>
                    </div>
                </form>
            </div>

            <div id="loginText">
                <h1>Listen to some great tunes</h1>
                <h2>Discover new sounds</h2>
                <ul>
                    <li>Create unique playlists</li>
                    <li>Find songs you've never heard of before</li>
                    <li>All for free</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>