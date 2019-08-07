<?php
$userName = $_POST["name"];
$mailadres = $_POST["email"];
$bericht = $_POST["message"];

if (isset($_POST["name"])) {
  if (empty($_POST["name"])) {
    echo "Name is a Required Field";
  } else {
    $newName = filter_var($userName, FILTER_SANITIZE_STRING);
  }
}

if (isset($_POST["email"])) {
  echo "yay";
  if (empty($_POST["email"])) {
    echo "Email is a Required Field";           
  } else { 
    $newEmail = filter_var($mailadres, FILTER_SANITIZE_EMAIL);
    echo $newEmail;
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Please make sure you entered a valid email";
    }
  }
  if (isset($_POST["message"])) {
    if (empty($_POST["message"])) {
      echo "Message is Required";
    } else {
      $newMessage = filter_var($bericht, FILTER_SANITIZE_STRING);
    }
  }
}

if (isset($_POST["name"])) {
  include('form.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>contact form</title>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="page-wrapper">
    <h1><u>Contact Form<u></h1>
    <div id="form-messages"></div>
    <form id="ajax-contact" method="post">
      <div class="field">
        <label for="name">Name:</label>
        <input type="text" id="name" placeholder="Thy nameth" name="name">

      </div>
      <div class="field">
        <label for="email">Email-adress:</label>
        <input type="text" id="email" placeholder="posteth adres" name="email">
      </div>

      <div class="field">
        <label for="message">Message:</label>
        <textarea id="message" placeholder="heareth thee writeth thy message h're" type="text" name="message"></textarea>
      </div>
      <div class="field">
        <button class="brown-btn" type="submit">sendeth</button>
      </div>
    </form>
  </div>
</body>

</html>