<?php
class Account
{

  public function __construct()
  { }

  public function register()
  {
    $this->validateUsername($username);
    $this->validateFirstName($firstName);
    $this->validateLastName($lastName);
    $this->validateEmails($email, $emailConfirm);
    $this->validatePasswords($password, $passwordConfirm);
  }

  private function validateUsername($un)
  { echo "username function called"; }

  private function validateFirstName($fn)
  { }

  private function validateLastName($ln)
  { }

  private function validateEmails($em, $emC)
  { }

  private function validatePasswords($pw, $pwC)
  { }
}
