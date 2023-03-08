<?php

// Display Error's 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Geting Information
require_once("utils.php");
require_once("HNDT.class.php");

$data = $_REQUEST;
var_dump($data);

$validform = true;
$username = (array_key_exists('username', $data) ? $data['username'] : null);
$emailadd = (array_key_exists('emailadd', $data) ? $data['emailadd'] : null);
$dobstr = (array_key_exists('dob', $data) ? $data['dob'] : null);
$userpass = (array_key_exists('userpass', $data) ? $data['userpass'] : null);

//UserName
$tempuname = sanitiseStr($username);
if (strlen($tempuname) >= 5 && strlen($tempuname) <= 30) {
     $username = $tempuname;
     echo " <br /> $username is a valid Personal name <br />";
} else {
     $validform = false;
     echo "Personal name is not valid <br />";
}

//Email 
$tempemail = sanitiseEmail($emailadd);
if (validateEmail($tempemail)) {
     echo "$tempemail is a valid email address <br />";
     $emailadd = $tempemail;
} else {
     echo "Email is not valid  <br />";
     $validform = false;
}

//Date of Birth 
if ($dobstr !== null) {
     $dob = new HNDT();
     $dobresult = $dob->setDOB($dobstr);
     if ($dobresult) {
          if ($dob->getAge() >= 16) {
               echo "<br /> $dob  is a balid date <br />";
          } else {
               echo $dob->getAge() . "Is too Young  <br />";
               $validform = false;
          }
     } else {
          echo "A valid dob was not supplied <br/>";
          $validform = false;
     }
} else {
     echo "DOB not supplied <br />";
     $validform = false;
}

//Password
$tempunpass = sanitiseStr($userpass, allowHTML: true, encodeHTML: false);
if (strlen($tempunpass) >= 5 && strlen($tempunpass) <= 15) {
     $userpass = $tempunpass;
     echo " valid Password <br />";
} else {
     $validform = false;
     echo "Password is not valid <br />";
}

//form
if ($validform) {
     echo "All data supplied can be validated  <br />";
} else {
     echo "Not all supplied data is valid  <br />";
}

?>

<style>
     /* HTML PAGE TEXT */
     html {
          font-family: Arial, Helvetica, sans-serif;
     }

     /* BODY: TEXT, COLOR, DISPLAY */
     body {
          font-size: 18px;
          background-color: #121212;
          color: #ffffff;
          height: 100vh;
          width: 100vw;
          overflow: hidden;
          scroll-behavior: smooth;
          text-align: center;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
     }
</style>