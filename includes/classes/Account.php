<?php
class Account
{

  private $con;
  private $errorArray;

  public function __construct($con)
  {
    $this->con = $con;
    $this->errorArray = array();
  }

  public function register($un, $fn, $ln, $em, $emC, $pw, $pwC)
  {
    $this->validateUsername($un);
    $this->validateFirstName($fn);
    $this->validateLastName($ln);
    $this->validateEmails($em, $emC);
    $this->validatePasswords($pw, $pwC);

    if (empty($this->errorArray) == true) {
      // insert into db
      return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
    } else {
      return false;
    }
  }

  public function getError($error)
  {
    if (!in_array($error, $this->errorArray)) {
      $error = "";
    }
    return "<span class='errorMessage'>$error</span>";
  }

  private function insertUserDetails($un, $fn, $ln, $em, $pw)
  {
    $encryptedPw = md5($pw);
    $profilePic = "assets/images/profile-pics/profile_placeholder.png";
    $date = date("Y-m-d");

    $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
    return $result;
  }

  private function validateUsername($un)
  {
    if (strlen($un) > 25 || strlen($un) < 5) {
      array_push($this->errorArray, Constants::$usernameCharacters);
      return;
    }

    $checkUsernameQuery = mysqli_query($this->con, "SELECT username from users WHERE username='$un'");
    if (mysqli_num_rows($checkUsernameQuery) != 0) {
      array_push($this->errorArray, Constants::$usernameTaken);
    }
  }

  private function validateFirstName($fn)
  {
    if (strlen($fn) > 25 || strlen($fn) < 2) {
      array_push($this->errorArray, Constants::$firstNameCharacters);
      return;
    }
  }

  private function validateLastName($ln)
  {
    if (strlen($ln) > 25 || strlen($ln) < 2) {
      array_push($this->errorArray, Constants::$lastNameCharacters);
      return;
    }
  }

  private function validateEmails($em, $emC)
  {
    if ($em != $emC) {
      array_push($this->errorArray, Constants::$emailsDoNotMatch);
    }

    if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errorArray, Constants::$emailInvalid);
    }

    $checkEmailQuery = mysqli_query($this->con, "SELECT email from users WHERE email='$em'");
    if (mysqli_num_rows($checkEmailQuery) != 0) {
      array_push($this->errorArray, Constants::$emailTaken);
    }
  }

  private function validatePasswords($pw, $pwC)
  {
    if ($pw != $pwC) {
      array_push($this->errorArray, Constants::$passwordsDoNotMatch);
      return;
    }

    if (preg_match('/[^A-Za-z0-9]/', $pw)) {
      array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
      return;
    }

    if (strlen($pw) > 30 || strlen($pw) < 6) {
      array_push($this->errorArray, Constants::$usernameCharacters);
    }
  }
}
