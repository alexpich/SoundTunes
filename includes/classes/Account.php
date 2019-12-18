<?php
class Account
{

  private $errorArray;

  public function __construct()
  {
    $this->errorArray = array();
  }

  public function register($un, $fn, $ln, $em, $emC, $pw, $pwC)
  {
    $this->validateUsername($un);
    $this->validateFirstName($fn);
    $this->validateLastName($ln);
    $this->validateEmails($em, $emC);
    $this->validatePasswords($pw, $pwC);
  }

  private function validateUsername($un)
  {
    if (strlen($un) > 25 || strlen($un) < 5) {
      array_push($this->errorArray, "Your username must be between 5 and 25 characters.");
      return;
    }

    //TODO: check if username exists
  }

  private function validateFirstName($fn)
  {
    if (strlen($fn) > 25 || strlen($fn) < 2) {
      array_push($this->errorArray, "Your first name must be between 2 and 25 characters.");
      return;
    }
  }

  private function validateLastName($ln)
  {
    if (strlen($ln) > 25 || strlen($ln) < 2) {
      array_push($this->errorArray, "Your last name must be between 5 and 25 characters.");
      return;
    }
  }

  private function validateEmails($em, $emC)
  { 
    if($em != $emC) {
      array_push($this->errorArray, "Email does not match.");
    }

    if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errorArray, "Invalid email.");
    }
  }

  private function validatePasswords($pw, $pwC)
  { }
}
